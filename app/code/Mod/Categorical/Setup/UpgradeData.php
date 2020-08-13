<?php

namespace Mod\Categorical\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_eavSetupFactory;

    public function __construct(EavSetup $eavSetupFactory)
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '0.0.8', '<')) {
            $setup->startSetup();

            $this->_eavSetupFactory->updateAttribute(
                '3',
                '165',
                'frontend_input',
                'boolean'
            )->updateAttribute(
                '3',
                '165',
                'source_model',
                'Magento\Eav\Model\Entity\Attribute\Source\Boolean'
            )->updateAttribute(
                '3',
                '165',
                'backend_type',
                'int'
            );

            $setup->endSetup();
        }
    }
}
