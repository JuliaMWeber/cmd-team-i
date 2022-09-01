<?php
namespace MediaEssenz\MeGoogleCalendar\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2020 Alexander Grein <alexander.grein@gmail.com>, MEDIA::ESSENZ
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

/**
 *
 *
 * @package me_google_calendar
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CalendarRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Find all records from given uids and
     * respect the sorting
     *
     * @param array $uids
     * @return QueryResultInterface|array
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function findByUids($uids)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);
        $query->matching(
            $query->in('uid', $uids)
        );
        return $query->execute();
    }

    /**
     * Finds all addresses by the specified map or the storage pid
     *
     * @return QueryResultInterface The addresses
     */
    function findAllCalendarRecords()
    {
        $query = $this->createQuery();

        $storagePageIds = $query->getQuerySettings()->getStoragePageIds();
        $respectStoragePage = $storagePageIds[0] > 0;

        $query->getQuerySettings()->setRespectStoragePage($respectStoragePage);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        return $query->execute();
    }
}
