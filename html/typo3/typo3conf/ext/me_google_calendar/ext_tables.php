<?php
defined('TYPO3_MODE') or die();

(function () {
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_megooglecalendar_domain_model_calendar',
    'EXT:me_google_calendar/Resources/Private/Language/locallang_csh_tx_megooglecalendar_domain_model_calendar.xlf');

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_megooglecalendar_domain_model_calendar');
})();
