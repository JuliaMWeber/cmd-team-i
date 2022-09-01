<?php

/**
 * Abstraction of the Writer.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Localization\Writer;

use HDNET\Autoloader\Utility\FileUtility;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Abstraction of the Writer.
 */
abstract class AbstractLocalizationWriter implements LocalizationWriterInterface
{
    /**
     * Language file base name.
     *
     * @var string
     */
    protected $languageBaseName = 'locallang';

    /**
     * Create default file.
     */
    public function createFileIfNotExists(string $extensionKey): bool
    {
        $fileName = $this->getAbsoluteFilename($extensionKey);
        if (is_file($fileName)) {
            return true;
        }

        return FileUtility::writeFileAndCreateFolder($fileName, $this->getBaseFileContent($extensionKey));
    }

    /**
     * Get language base name.
     */
    public function getLanguageBaseName(): string
    {
        return $this->languageBaseName;
    }

    /**
     * Set language base name.
     *
     * @param string $languageBaseName
     */
    public function setLanguageBaseName($languageBaseName): void
    {
        $this->languageBaseName = $languageBaseName;
    }

    /**
     * flush the l10n caches.
     */
    protected function clearCache(): void
    {
        $caches = [
            't3lib_l10n',
            'l10n',
        ];
        /** @var CacheManager $cacheManager */
        $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
        foreach ($caches as $name) {
            try {
                $cache = $cacheManager->getCache($name);
                if ($cache) {
                    $cache->flush();
                }
            } catch (\Exception $ex) {
                // Catch is empty, because we want to avoid exceptions in this process
            }
        }
    }

    /**
     * Wrap CDATA.
     */
    protected function wrapCdata(string $content): string
    {
        if (htmlentities($content, ENT_NOQUOTES) !== $content) {
            $content = '<![CDATA[' . $content . ']]>';
        }

        return $content;
    }
}
