<?php

namespace BettenReise\Challenge\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Description of InstallSchema
 *
 * @author mubasharkk
 */

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
 
        // Get bettenreise_challenge table
        $tableName = $installer->getTable('bettenreise_challenge_rules');
        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            // Create tutorial_simplenews table
            $table = $installer->getConnection()
                ->newTable($tableName)
				// Add rule ID column
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
				// Rule applied on Product Category or SKU
                ->addColumn(
                    'rule_type',
                    Table::TYPE_TEXT,
                    20,
                    ['nullable' => false, 'default' => 'sku'],
                    'Type of rule to display data (category or sku).'
                )
				// SKU or Category ID
                ->addColumn(
                    'rule_id',
                    Table::TYPE_TEXT,
                    20,
                    ['nullable' => false, 'default' => ''],
                    'SKU ID or Category ID'
                )
				// Content to be rendered
                ->addColumn(
                    'content',
                    Table::TYPE_BLOB,
                    null,
                    ['nullable' => true, 'default' => ''],
                    'Description'
                )
				// PHTML Path to render
                ->addColumn(
                    'phtml_path',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => true, 'default' => ''],
                    'Description'
                )
				// status : Enabled(1) or Disabled (0)
                ->addColumn(
                    'status',
                    Table::TYPE_SMALLINT,
                    null,
                    ['nullable' => false, 'default' => '1'],
                    'Status'
                )
				// created at
                ->addColumn(
                    'created_at',
                    Table::TYPE_DATETIME,
                    null,
                    ['nullable' => false],
                    'Created At'
                )
                ->setComment('Table for managing BetterReise Challenge rules')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
 
        $installer->endSetup();
    }
}
 