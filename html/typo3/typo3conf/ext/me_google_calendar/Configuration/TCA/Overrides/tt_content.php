<?php
defined('TYPO3_MODE') or die();

// Register plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'me_google_calendar',
    'Pi1',
    'Calendar'
);

// Hide not used fields
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['megooglecalendar_pi1'] = 'code,layout,select_key,pages,recursive';

// Add flexform
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['megooglecalendar_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('megooglecalendar_pi1', 'FILE:EXT:me_google_calendar/Configuration/FlexForms/Pi1.xml');
