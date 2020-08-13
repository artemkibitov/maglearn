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
        $eavSetup = $this->_eavSetupFactory->create();

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'categorical',
            [
                'group' => 'General',
                'type' => 'varchar',
                'label' => 'Categorical',
                'input' => 'text',
                'source' => 'Mod\Categorical\Model\Attribute\Source\Categorical',
                'frontend' => 'Mod\Categorical\Model\Attribute\Frontend\Categorical',
                'backend' => 'Mod\Categorical\Model\Attribute\Backend\Categorical',
                'required' => false,
                'sort_order' => 50,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid' => false,
                'is_visible_in_grid' => false,
                'is_filterable_in_grid' => false,
                'visible' => true,
                'is_html_allowed_on_front' => true,
                'visible_on_front' => true
            ]
        );
    }
}
