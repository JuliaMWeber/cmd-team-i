<?php

/**
 * Map int.
 */
declare(strict_types=1);

namespace HDNET\Autoloader\Mapper;

use HDNET\Autoloader\MapperInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Map int.
 */
class IntMapper implements MapperInterface
{
    /**
     * Check if the current mapper can handle the given type.
     *
     * @param string $type
     */
    public function canHandleType($type): bool
    {
        return \in_array(mb_strtolower($type), [
            'int',
            'integer',
        ], true);
    }

    /**
     * Get the TCA configuration for the current type.
     *
     * @param string $fieldName
     * @param bool   $overWriteLabel
     *
     * @return array<string, mixed[]>
     */
    public function getTcaConfiguration($fieldName, $overWriteLabel = false): array
    {
        return [
            'exclude' => 1,
            'label' => $overWriteLabel ?: $fieldName,
            'config' => [
                'type' => 'input',
                'eval' => 'int',
                'size' => 10,
            ],
        ];
    }

    /**
     * Get the database definition for the current mapper.
     */
    public function getDatabaseDefinition(): string
    {
        return 'int(11) DEFAULT \'0\' NOT NULL';
    }

    public function getJsonDefinition($type, $fieldName, $className, $extensionKey, $tableName)
    {
        $fieldNameUnderscored = GeneralUtility::camelCaseToLowerCaseUnderscored($fieldName);

        return "
        {$fieldName} = INTEGER
        {$fieldName} {
            field = {$fieldNameUnderscored}
        }
        ";
    }
}
