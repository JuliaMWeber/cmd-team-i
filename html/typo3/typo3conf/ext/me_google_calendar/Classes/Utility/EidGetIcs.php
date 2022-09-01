<?php
namespace MediaEssenz\MeGoogleCalendar\Utility;

use DateTime;
use DateTimeZone;
use Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2020 Alexander Grein
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class EidGetIcs
{
    /**
     * @throws Exception
     */
    public static function main()
    {

        $allDay = strpos(GeneralUtility::_GP('dtstart') , 'T') === false;

        $timeZoneString = GeneralUtility::_GP('timezone') ? GeneralUtility::_GP('timezone') : date_default_timezone_get();
        $filenameTimeZone = new DateTimeZone($timeZoneString);
        $utcTimeZone = new DateTimeZone('UTC');

        $dtstartDateTime = new DateTime(GeneralUtility::_GP('dtstart'), $utcTimeZone);
        $filenameStartDateTime = clone $dtstartDateTime;
        $filenameStartDateTime->setTimezone($filenameTimeZone);
        $dtstartDate = $dtstartDateTime->format('Ymd');
        $dtstartTime = $dtstartDateTime->format('His');
        $filenameStartTime = $allDay ? '' : '_' . $filenameStartDateTime->format('Hi');

        $dtendDateTime = new DateTime(GeneralUtility::_GP('dtend'), $utcTimeZone);
        $filenameEndDateTime = clone $dtendDateTime;
        $filenameEndDateTime->setTimezone($filenameTimeZone);
        $dtendDate = $dtendDateTime->format('Ymd');
        $dtendTime = $dtendDateTime->format('His');
        $filenameEndTime = $allDay ? '' : '_' . $filenameEndDateTime->format('Hi');

        if ($allDay && $filenameEndDateTime->diff($filenameStartDateTime)->days > 1) {
            $filenameEndTime .= $filenameEndDateTime->modify('-1 day')->format('Ymd') . $filenameEndTime;
        }

        if ($filenameEndTime) {
            $filenameEndTime = '-' . $filenameEndTime;
        }

        $filenameEndTime = str_replace('-_', '-', $filenameEndTime);

        header('Content-type: text/calendar');
        header('Content-Disposition: attachment; filename=' . urlencode(GeneralUtility::_GP('summary')) . '_' . $dtstartDate . $filenameStartTime . $filenameEndTime . '.ics');
        header('Pragma: no-cache');
        header('Expires: 0');

        $content = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:TYPO3//MeGoogleCalendar
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
UID:' . htmlspecialchars(GeneralUtility::_GP('uid')) . '
SUMMARY:' . htmlspecialchars(GeneralUtility::_GP('summary')) . '
DTSTAMP:' . date('Ymd\THis\Z') . '
DTSTART:' . $dtstartDate . ($allDay ? '' : 'T' . $dtstartTime . 'Z') . '
DTEND:' . $dtendDate . ($allDay ? '' : 'T' . $dtendTime . 'Z') . '
' . (GeneralUtility::_GP('description') !== 'undefined' ? 'DESCRIPTION:' . trim(htmlspecialchars(strip_tags(str_replace('<br>', '\\n', GeneralUtility::_GP('description'))))) : '') . '
' . (GeneralUtility::_GP('location') !== 'undefined' ? 'LOCATION:' . htmlspecialchars(GeneralUtility::_GP('location')) : '') . '
END:VEVENT
END:VCALENDAR';

        echo $content;
        exit();
    }
}
