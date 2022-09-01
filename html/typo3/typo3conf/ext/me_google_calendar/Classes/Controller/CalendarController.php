<?php
namespace MediaEssenz\MeGoogleCalendar\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

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
class CalendarController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var \MediaEssenz\MeGoogleCalendar\Domain\Repository\CalendarRepository
     */
    protected $calendarRepository;

    /**
     * inject the calendarRepository
     *
     * @param \MediaEssenz\MeGoogleCalendar\Domain\Repository\CalendarRepository $calendarRepository
     * @return void
     */
    public function injectCalendarRepository(\MediaEssenz\MeGoogleCalendar\Domain\Repository\CalendarRepository $calendarRepository)
    {
    	$this->calendarRepository = $calendarRepository;
    }

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * Injects the Configuration Manager and is initializing the framework settings
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager Instance of the Configuration Manager
     * @return void
     */
    public function injectConfigurationManager(
        ConfigurationManagerInterface $configurationManager
    )
    {
        $this->configurationManager = $configurationManager;

        $mergedSettings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

        $fullTyposcriptSettings = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $tsSetupSettings = $fullTyposcriptSettings['plugin.']['tx_megooglecalendar.']['settings.'];

        // start override
        if (isset($tsSetupSettings['overrideFlexformSettingsIfEmpty'])) {
            $overrideIfEmpty = GeneralUtility::trimExplode(',',
                $tsSetupSettings['overrideFlexformSettingsIfEmpty'], true);
            foreach ($overrideIfEmpty as $key) {
                // if flexform setting is empty and value is available in TS
                if ((!isset($mergedSettings[$key]) || empty($mergedSettings[$key]))
                    && isset($tsSetupSettings[$key])
                ) {
                    $mergedSettings[$key] = $tsSetupSettings[$key];
                }
            }
        }

        $this->settings = $mergedSettings;
    }

    /**
     * action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function listAction()
    {
        $calendarRecordUidsCsv = $this->settings['calendarRecords'];
        $calendarRecordUidsArray = GeneralUtility::trimExplode(',', $calendarRecordUidsCsv, true);
        if (count($calendarRecordUidsArray) > 0) {
            $calendars = $this->calendarRepository->findByUids($calendarRecordUidsArray);
        } else {
            $calendars = $this->calendarRepository->findAllCalendarRecords();
        }

        $this->view->assign('calendars', $calendars);
        $cObj = $this->configurationManager->getContentObject();
        $this->view->assign('contentKey', 'me_google_calendar_c' . $cObj->data['uid']);
    }
}
