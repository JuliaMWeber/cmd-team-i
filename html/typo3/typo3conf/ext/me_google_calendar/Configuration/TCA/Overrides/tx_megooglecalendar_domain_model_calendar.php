<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3_MODE') or die();

if ((bool) GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('me_google_calendar', 'restrictToPredefinedCssClasses')) {

    // Change css field from text to select
    $additionalColumns = [
        'css' => [
            'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css_restricted',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
                'items' => [
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.default', ''],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-red', 'fc-red'],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-green', 'fc-green'],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-blue', 'fc-blue'],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-grey', 'fc-grey'],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-orange', 'fc-orange'],
                    ['LLL:EXT:me_google_calendar/Resources/Private/Language/locallang.xlf:tx_megooglecalendar_domain_model_calendar.css.item.fc-purple', 'fc-purple'],
                ],
            ],
        ],
    ];
    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['tx_megooglecalendar_domain_model_calendar']['columns'],
        $additionalColumns
    );
    unset($additionalColumns);
}
