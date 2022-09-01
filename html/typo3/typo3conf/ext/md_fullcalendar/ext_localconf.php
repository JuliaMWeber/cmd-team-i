<?php
/*
defined('TYPO3') or die();

call_user_func(function()
{
    $extensionKey = 'myextension';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
        $extensionKey,
        'setup',
        "@import 'EXT:myextension/Configuration/TypoScript/setup.typoscript'"
    );
});
*/

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Mediadreams.MdFullcalendar',
            'Cal',
            [
                \Mediadreams\MdFullcalendar\Controller\CalController::class => 'show, list, detail'
            ],
            // non-cacheable actions
            [
                \Mediadreams\MdFullcalendar\Controller\CalController::class => ''
            ]
        );

        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        
        $iconRegistry->registerIcon(
            'md_fullcalendar-plugin-cal',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:md_fullcalendar/Resources/Public/Icons/PluginCal.svg']
        );
        
    }
);
