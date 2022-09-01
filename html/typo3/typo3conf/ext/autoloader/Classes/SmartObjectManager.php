<?php

/**
 * Management for Smart Objects.
 */
declare(strict_types=1);

namespace HDNET\Autoloader;

use Doctrine\Common\Annotations\AnnotationReader;
use HDNET\Autoloader\Annotation\DatabaseTable;
use HDNET\Autoloader\Service\SmartObjectInformationService;
use HDNET\Autoloader\Utility\ClassNamingUtility;
use HDNET\Autoloader\Utility\FileUtility;
use HDNET\Autoloader\Utility\ModelUtility;
use HDNET\Autoloader\Utility\ReflectionUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Management for Smart Objects.
 */
class SmartObjectManager implements SingletonInterface
{
    /**
     * Return the SQL String for all registered smart objects.
     *
     * @return string[]
     */
    public static function getSmartObjectRegisterSql(): array
    {
        $informationService = SmartObjectInformationService::getInstance();
        $register = SmartObjectRegister::getRegister();

        $output = [];
        foreach ($register as $modelName) {
            $output[] = $informationService->getDatabaseInformation($modelName);
        }

        return $output;
    }

    /**
     * Check if the given class is a smart object.
     *
     * Also add a work around, because the static_info_tables SPL Autoloader
     * get into a conflict with different classes.
     */
    public static function isSmartObjectClass(string $className): bool
    {
        $smartObjectClassLoadingIgnorePattern = self::getSmartObjectClassLoadingIgnorePattern();
        if ('' !== trim($smartObjectClassLoadingIgnorePattern) && preg_match($smartObjectClassLoadingIgnorePattern, $className)) {
            return false;
        }

        if (!class_exists($className)) {
            return false;
        }

        if (!ReflectionUtility::isInstantiable($className)) {
            return false;
        }

        /** @var AnnotationReader $annotationReader */
        $annotationReader = GeneralUtility::makeInstance(AnnotationReader::class);

        $classNameRef = new \ReflectionClass($className);

        return null !== $annotationReader->getClassAnnotation($classNameRef, DatabaseTable::class);
    }

    /**
     * Check and create the TCA information
     * disable this for better performance.
     */
    public static function checkAndCreateTcaInformation(): void
    {
        $register = SmartObjectRegister::getRegister();

        $baseTemplatePath = ExtensionManagementUtility::extPath('autoloader', 'Resources/Private/Templates/TcaFiles/');
        $defaultTemplate = GeneralUtility::getUrl($baseTemplatePath . 'Default.tmpl');
        $overrideTemplate = GeneralUtility::getUrl($baseTemplatePath . 'Override.tmpl');

        $search = [
            '__modelName__',
            '__tableName__',
            '__extensionKey__',
        ];

        foreach ($register as $model) {
            $extensionKey = ClassNamingUtility::getExtensionKeyByModel($model);
            $basePath = ExtensionManagementUtility::extPath($extensionKey) . 'Configuration/TCA/';

            $tableName = ModelUtility::getTableNameByModelReflectionAnnotation($model);
            if ('' !== $tableName) {
                $tcaFileName = $basePath . 'Overrides/' . $tableName . '.php';
                $template = $overrideTemplate;
            } else {
                $tableName = ModelUtility::getTableNameByModelName($model);
                $tcaFileName = $basePath . $tableName . '.php';
                $template = $defaultTemplate;
            }

            if (!is_file($tcaFileName)) {
                $replace = [
                    '\\' . trim($model) . '::class',
                    $tableName,
                    $extensionKey,
                ];

                $content = str_replace($search, $replace, $template);
                FileUtility::writeFileAndCreateFolder($tcaFileName, $content);
            }
        }
    }

    /**
     * Get ignore pattern.
     */
    protected static function getSmartObjectClassLoadingIgnorePattern(): string
    {
        $configuration = (array)GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('autoloader');

        return isset($configuration['smartObjectClassLoadingIgnorePattern']) ? (string)$configuration['smartObjectClassLoadingIgnorePattern'] : '';
    }
}
