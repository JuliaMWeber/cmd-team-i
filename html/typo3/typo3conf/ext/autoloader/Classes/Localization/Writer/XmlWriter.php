<?php

/**
 * XML writer.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Localization\Writer;

use HDNET\Autoloader\Utility\FileUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * XML writer.
 */
class XmlWriter extends AbstractLocalizationWriter
{
    /**
     * Get the base file content.
     *
     * @param string $extensionKey
     */
    public function getBaseFileContent($extensionKey): string
    {
        return '<?xml version="1.0"?>
<T3locallang>
	<meta type="array">
	<type>database</type>
	<description>Language file is created via the autoloader for the ' . $extensionKey . ' extension on ' . date(DATE_COOKIE) . '</description>
	</meta>
	<data type="array">
		<languageKey index="default" type="array">
		</languageKey>
	</data>
</T3locallang>';
    }

    /**
     * Get the absolute file name.
     *
     * @param string $extensionKey
     */
    public function getAbsoluteFilename($extensionKey): string
    {
        return ExtensionManagementUtility::extPath($extensionKey, 'Resources/Private/Language/' . $this->getLanguageBaseName() . '.xml');
    }

    /**
     * Add the label to a XML file.
     *
     * @param string $extensionKey
     * @param string $key
     * @param string $default
     *
     * @return bool|void
     */
    public function addLabel($extensionKey, $key, $default): void
    {
        // Exclude
        if (0 === mb_strlen($default)) {
            return;
        }
        if (0 === mb_strlen($key)) {
            return;
        }
        if (0 === mb_strlen($extensionKey)) {
            return;
        }
        if (GeneralUtility::isFirstPartOfStr($key, 'LLL:')) {
            return;
        }
        $absolutePath = $this->getAbsoluteFilename($extensionKey);
        $content = GeneralUtility::getUrl($absolutePath);
        if (false !== mb_strpos($content, ' index="' . $key . '"') || '' === trim($content)) {
            return;
        }
        $replace = '<languageKey index="default" type="array">' . LF . "\t" . "\t" . "\t" . '<label index="' . $key . '">' . $this->wrapCdata($default) . '</label>';
        $content = str_replace('<languageKey index="default" type="array">', $replace, $content);
        FileUtility::writeFileAndCreateFolder($absolutePath, $content);
        $this->clearCache();
    }
}
