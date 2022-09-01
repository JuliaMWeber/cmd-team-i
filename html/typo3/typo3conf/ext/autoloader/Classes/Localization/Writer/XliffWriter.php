<?php

/**
 * Xliff writer.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Localization\Writer;

use HDNET\Autoloader\Utility\FileUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Xliff writer.
 */
class XliffWriter extends AbstractLocalizationWriter
{
    /**
     * Get the base file content.
     *
     * @param string $extensionKey
     */
    public function getBaseFileContent($extensionKey): string
    {
        return '<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<xliff version="1.0">
	<file source-language="en" datatype="plaintext" original="messages" date="' . date('c') . '" product-name="' . $extensionKey . '">
		<header/>
		<body>
		</body>
	</file>
</xliff>';
    }

    /**
     * Get the absolute file name.
     *
     * @param string $extensionKey
     */
    public function getAbsoluteFilename($extensionKey): string
    {
        return ExtensionManagementUtility::extPath($extensionKey, 'Resources/Private/Language/' . $this->getLanguageBaseName() . '.xlf');
    }

    /**
     * Add the Label to the local lang XLIFF.
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

        $absolutePath = $this->getAbsoluteFilename($extensionKey);
        $content = GeneralUtility::getUrl($absolutePath);
        if (false !== mb_strpos($content, ' id="' . $key . '"') || '' === trim($content)) {
            return;
        }
        $replace = '<body>' . LF . "\t" . "\t" . "\t" . '<trans-unit id="' . $key . '"><source>' . $this->wrapCdata($default) . '</source></trans-unit>';
        $content = str_replace('<body>', $replace, $content);
        FileUtility::writeFileAndCreateFolder($absolutePath, $content);
        $this->clearCache();
    }
}
