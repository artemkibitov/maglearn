<?php

namespace Mod\Categorical\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    protected $_eavSetupFactory;

    /**
     * Init.
     * @param EavSetupFactory $eavSetupFactory
     */

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
    }
}
