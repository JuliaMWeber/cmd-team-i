<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'me_google_calendar',
    'Configuration/TypoScript',
    'Google Calendar'
);
