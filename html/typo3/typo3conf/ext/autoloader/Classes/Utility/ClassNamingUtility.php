<?php

/**
 * ClassNamingUtility.php.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Utility;

use HDNET\Autoloader\Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ClassNamingUtility.
 */
class ClassNamingUtility
{
    /**
     * Explodes a modelName like \Vendor\Ext\Domain\Model\Foo into several
     * pieces like vendorName, extensionName, subpackageKey and controllerName.
     *
     * @param string $modelName The model name to be exploded
     *
     * @throws Exception
     *
     * @return array Parts of the object model name
     *
     * @see \TYPO3\CMS\Core\Utility\ClassNamingUtility::explodeObjectControllerName
     */
    public static function explodeObjectModelName(string $modelName): array
    {
        if (false !== mb_strpos($modelName, '\\')) {
            if ('TYPO3\\CMS' === mb_substr($modelName, 0, 9)) {
                $extensionName = '^(?P<vendorName>[^\\\\]+\\\[^\\\\]+)\\\(?P<extensionName>[^\\\\]+)';
            } else {
                $extensionName = '^(?P<vendorName>[^\\\\]+)\\\\(?P<extensionName>[^\\\\]+)';
            }
            $regEx = '/' . $extensionName . '\\\\Domain\\\\Model\\\\(?P<modelName>[a-z0-9\\\\]+)$/ix';
        } else {
            $regEx = '/^Tx_(?P<extensionName>[^_]+)_Domain_Model_(?P<modelName>[a-z0-9_]+)/ix';
        }

        preg_match($regEx, $modelName, $matches);
        if (empty($matches)) {
            throw new Exception('Could not determine extension key for: ' . $modelName, 140657775);
        }

        return $matches;
    }

    /**
     * Get the extension key by the given model name.
     *
     * @param object|string $modelClassName
     */
    public static function getExtensionKeyByModel($modelClassName): string
    {
        if (\is_object($modelClassName)) {
            $modelClassName = \get_class($modelClassName);
        }
        $matches = self::explodeObjectModelName($modelClassName);

        return GeneralUtility::camelCaseToLowerCaseUnderscored($matches['extensionName']);
    }

    /**
     * Get FQN by path (segment).
     */
    public static function getFqnByPath(string $vendorName, string $extensionKey, string $path): string
    {
        return $vendorName . '\\' . ucfirst(GeneralUtility::underscoredToUpperCamelCase($extensionKey)) . '\\' . str_replace(
            '/',
            '\\',
            ltrim($path, '/')
        );
    }
}
