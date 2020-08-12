<?php

namespace Mod\First\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.1.3', '<')) {
            $installer->getConnection()->addColumn(
                $installer->getTable('mod_first_post'),
                'category',
                [
                    'type'  => Table::TYPE_TEXT,
                    'nullable'  => true,
                    'length'    => '128',
                    'default'   => 'CRUD',
                    'comment'   =>  'category_column',
                    'after' => 'post_content'
                ]
            );
        }
        $installer->endSetup();
    }
}
