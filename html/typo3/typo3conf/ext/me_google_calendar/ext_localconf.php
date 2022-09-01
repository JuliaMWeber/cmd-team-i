<?php
defined('TYPO3_MODE') or die();

(function () {
  /*
   * Register Icon
   */
  /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
  $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
  $iconRegistry->registerIcon(
    'tx-megooglecalendar-calendar',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:me_google_calendar/Resources/Public/Icons/tx_megooglecalendar_domain_model_calendar.svg']
  );

  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'MediaEssenz.MeGoogleCalendar',
    'Pi1',
    [
      \MediaEssenz\MeGoogleCalendar\Controller\CalendarController::class => 'list',
    ],
    [
    ]
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
    options.saveDocNew.tx_megooglecalendar_feeds=1
    ');

  $GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['meGoogleCalendarEidGetIcs'] = MediaEssenz\MeGoogleCalendar\Utility\EidGetIcs::class . '::main';
})();
