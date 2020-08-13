<?php

namespace Mod\Categorical\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class Uninstall implements \Magento\Framework\Setup\UninstallInterface
{
    protected $_eavSetupFactory;

    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->_eavSetupFactory->create();

        $eavSetup->removeAttribute();

        $setup->endSetup();
    }
}
