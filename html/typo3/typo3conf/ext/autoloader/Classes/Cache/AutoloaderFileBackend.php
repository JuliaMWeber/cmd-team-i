<?php

declare(strict_types=1);

namespace HDNET\Autoloader\Cache;

use TYPO3\CMS\Core\Cache\Backend\AbstractBackend;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * AutoloaderFileBackend.
 *
 * Note: This backend is usable without the caching framework
 */
class AutoloaderFileBackend extends AbstractBackend
{
    /**
     * {@inheritdoc}
     */
    public function set($entryIdentifier, $data, array $tags = [], $lifetime = null)
    {
        if (\is_array($data)) {
            $cacheFile = $this->getCacheFileName($entryIdentifier);
            GeneralUtility::writeFile($cacheFile, '<?php return ' . var_export($data, true) . ';');
        }

        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @return mixed|null
     */
    public function get($entryIdentifier)
    {
        if ($this->has($entryIdentifier)) {
            return include $this->getCacheFileName($entryIdentifier);
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function has($entryIdentifier): bool
    {
        return is_file($this->getCacheFileName($entryIdentifier));
    }

    /**
     * {@inheritdoc}
     */
    public function remove($entryIdentifier)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function flush(): void
    {
        $files = glob(Environment::getVarPath() . '/autoloader_*');
        foreach ($files as $file) {
            unlink($file);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function collectGarbage()
    {
        // Write by Loader::class
        return null;
    }

    protected function getCacheFileName($entryIdentifier): string
    {
        return Environment::getVarPath() . '/autoloader_' . $entryIdentifier . '.php';
    }
}
