<?php

namespace Mod\CustomPrice\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Zend_Validate_Exception;

class InstallData implements InstallDataInterface
{
    /**
     * EavSetupFactory
     * @var $_eavSetupFactory
     */
    private $_eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws LocalizedException
     * @throws Zend_Validate_Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) : void
    {
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_price',
            [
                'group'         =>  'General',
                'type'          =>  'decimal',
                'backend'       =>  'Mod\CustomPrice\Model\Attribute\Backend\CustomPrice',
                'frontend'      =>  'Mod\CustomPrice\Model\Attribute\Frontend\CustomPrice',
                'label'         =>  'Custom price',
                'input'         =>  'price',
                'class'         =>  '',
                'source'        =>  '',
                'global'        =>  \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'       => true,
                'required'      => false,
                'user_defined'  => false,
                'default'       => '',
                'searchable'    => false,
                'filterable'    => false,
                'comparable'    => false,
                'visible_on_front' => false,
                'unique'        => false,
                'apply_to'      => '',
                'used_in_product_listing' => true,
            ]
        );
    }
}
