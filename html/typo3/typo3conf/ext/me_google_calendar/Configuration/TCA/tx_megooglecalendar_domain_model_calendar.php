<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_megooglecalendar_domain_model_calendar',
  'EXT:me_google_calendar/Resources/Private/Language/locallang_csh_tx_megooglecalendar_domain_model_calendar.xlf');

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('lang')) {
  $generalLanguageFile = 'EXT:lang/Resources/Private/Language/locallang_general.xlf';
} else {
  $generalLanguageFile = 'EXT:core/Resources/Private/Language/locallang_general.xlf';
}

return [
  'ctrl' => [
    'title' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'dividers2tabs' => true,
    'sortby' => 'sorting',
    'versioningWS' => true,
    'origUid' => 't3_origuid',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'delete' => 'deleted',
    'enablecolumns' => [
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
      'fe_group' => 'fe_group',
    ],
    'searchFields' => 'title,css',
    'typeicon_classes' => [
      'default' => 'tx-megooglecalendar-calendar',
    ],
  ],
  'interface' => [
    'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, google_calendar_api_key, google_calendar_id, css, fe_group',
  ],
  'types' => [
    '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, google_calendar_api_key, google_calendar_id, css,--div--;LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:access,starttime, endtime, fe_group'],
  ],
  'palettes' => [
    '1' => ['showitem' => ''],
  ],
  'columns' => [
    'sys_language_uid' => [
      'exclude' => 1,
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.language',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => [
          [
            'LLL:' . $generalLanguageFile . ':LGL.allLanguages',
            -1,
          ],
          [
            'LLL:' . $generalLanguageFile . ':LGL.default_value',
            0,
          ],
        ],
        'allowNonIdValues' => true,
      ],
    ],
    'l10n_parent' => [
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.l18n_parent',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
          [
            '',
            0,
          ],
        ],
        'foreign_table' => 'tx_megooglecalendar_domain_model_calendar',
        'foreign_table_where' => 'AND tx_megooglecalendar_domain_model_calendar.pid=###CURRENT_PID### AND tx_megooglecalendar_domain_model_calendar.sys_language_uid IN (-1,0)',
        'default' => 0,
      ],
    ],
    'l10n_diffsource' => [
      'config' => [
        'type' => 'passthrough',
      ],
    ],
    't3ver_label' => [
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.versionLabel',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'max' => 255,
      ],
    ],
    'hidden' => [
      'exclude' => 1,
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.hidden',
      'config' => [
        'type' => 'check',
      ],
    ],
    'starttime' => [
      'exclude' => 1,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.starttime',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'size' => 13,
        'eval' => 'datetime',
        'checkbox' => 0,
        'default' => 0,
        'range' => [
          'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
        ],
      ],
    ],
    'endtime' => [
      'exclude' => 1,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.endtime',
      'config' => [
        'type' => 'input',
        'renderType' => 'inputDateTime',
        'size' => 13,
        'eval' => 'datetime',
        'checkbox' => 0,
        'default' => 0,
        'range' => [
          'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y')),
        ],
      ],
    ],
    'fe_group' => [
      'exclude' => 1,
      'label' => 'LLL:' . $generalLanguageFile . ':LGL.fe_group',
      'config' => [
        'type' => 'select',
        'renderType' => 'selectMultipleSideBySide',
        'size' => 5,
        'maxitems' => 20,
        'exclusiveKeys' => '-1,-2',
        'foreign_table' => 'fe_groups',
        'foreign_table_where' => 'ORDER BY fe_groups.title',
      ],
    ],
    'title' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar.title',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim,required',
      ],
    ],
    'url' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar.url',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'eval' => 'trim,required',
      ],
    ],
    'google_calendar_api_key' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar.google_calendar_api_key',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'eval' => 'trim,required',
      ],
    ],
    'google_calendar_id' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar.google_calendar_id',
      'config' => [
        'type' => 'input',
        'size' => 50,
        'eval' => 'trim,required',
      ],
    ],
    'css' => [
      'exclude' => 0,
      'label' => 'LLL:EXT:me_google_calendar/Resources/Private/Language/locallang_db.xlf:tx_megooglecalendar_domain_model_calendar.css',
      'config' => [
        'type' => 'input',
        'size' => 30,
        'eval' => 'trim',
      ],
    ],
  ],
];
