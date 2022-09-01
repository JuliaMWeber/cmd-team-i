<?php

/**
 * ContextSensitiveHelp (CSH) based on smart objects.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Loader;

use HDNET\Autoloader\Loader;
use HDNET\Autoloader\LoaderInterface;
use HDNET\Autoloader\Localization\LanguageHandler;
use HDNET\Autoloader\Service\SmartObjectInformationService;
use HDNET\Autoloader\SmartObjectRegister;
use HDNET\Autoloader\Utility\ClassNamingUtility;
use HDNET\Autoloader\Utility\ModelUtility;
use TYPO3\CMS\Core\Package\PackageManager;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

/**
 * ContextSensitiveHelp (CSH) based on smart objects.
 */
class ContextSensitiveHelps implements LoaderInterface
{
    /**
     * Get all the complex data for the loader.
     * This return value will be cached and stored in the database
     * There is no file monitoring for this cache.
     *
     * @return mixed[]
     */
    public function prepareLoader(Loader $loader, int $type): array
    {
        if (LoaderInterface::EXT_TABLES !== $type) {
            return [];
        }
        $modelInformation = $this->findTableAndModelInformationForExtension($loader->getExtensionKey());

        $loaderInformation = [];
        foreach ($modelInformation as $information) {
            $table = $information['table'];
            $path = $this->checkCshValues(
                $loader->getExtensionKey(),
                $information['table'],
                $information['properties']
            );
            if (null !== $path) {
                $loaderInformation[$table] = $path;
            }
        }

        return $loaderInformation;
    }

    /**
     * Run the loading process for the ext_tables.php file.
     */
    public function loadExtensionTables(Loader $loader, array $loaderInformation): void
    {
        foreach ($loaderInformation as $table => $path) {
            ExtensionManagementUtility::addLLrefForTCAdescr($table, $path);
        }
    }

    /**
     * Run the loading process for the ext_localconf.php file.
     *
     * @internal param \HDNET\Autoloader\Loader $autoLoader
     */
    public function loadExtensionConfiguration(Loader $loader, array $loaderInformation): void
    {
    }

    /**
     * Find table and model information for the given extension key.
     *
     * @return array<int, array<string, int[]|string[]|string>>
     */
    protected function findTableAndModelInformationForExtension(string $extensionKey): array
    {
        $information = [];
        $register = SmartObjectRegister::getRegister();
        foreach ($register as $class) {
            $parts = ClassNamingUtility::explodeObjectModelName($class);
            if (GeneralUtility::camelCaseToLowerCaseUnderscored($parts['extensionName']) === $extensionKey && '' === ModelUtility::getTableNameByModelReflectionAnnotation($class)) {
                $modelInformation = SmartObjectInformationService::getInstance()
                    ->getCustomModelFieldTca($class)
                ;

                $information[] = [
                    'table' => ModelUtility::getTableNameByModelName($class),
                    'properties' => array_keys($modelInformation),
                ];
            }
        }

        return $information;
    }

    /**
     * Check if the given file is already existing.
     *
     * @return string|void
     */
    protected function checkCshValues(string $extensionKey, string $table, array $properties)
    {
        $baseFileName = 'locallang_csh_' . $table;
        if (version_compare(VersionNumberUtility::getCurrentTypo3Version(), '11.5.2', '<=')) {
            /** @var LanguageHandler $languageHandler */
            $languageHandler = GeneralUtility::makeInstance(LanguageHandler::class);
        } else {
            $packageManager = GeneralUtility::makeInstance(PackageManager::class);
            /** @var LanguageHandler $languageHandler */
            $languageHandler = GeneralUtility::makeInstance(LanguageHandler::class, $packageManager);
        }

        foreach ($properties as $property) {
            $default = '';
            $languageHandler->handle($property . '.alttitle', $extensionKey, $default, [], $baseFileName);
        }

        $checkPath = ['xlf', 'xml'];
        foreach ($checkPath as $extension) {
            $path = 'EXT:' . $extensionKey . '/Resources/Private/Language/' . $baseFileName . '.' . $extension;
            if (is_file(GeneralUtility::getFileAbsFileName($path))) {
                return $path;
            }
        }
    }
}
