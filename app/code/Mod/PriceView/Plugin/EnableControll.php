<?php

namespace Mod\PriceView\Plugin;

use Magento\Catalog\Block\Product\View as Subject;
use Mod\PriceView\Helper\Data;

class EnableControll
{
    protected $_dataHelper;

    public function __construct(Data $dataHelper)
    {
        $this->_dataHelper = $dataHelper;
    }

    public function afterTierPrice(Subject $subject, $value)
    {
        if (!$this->_dataHelper->getGeneralConfig('enable')   ||
            !$this->_dataHelper->getGeneralConfig('tier_price')) {
            return false;
        }
        return  $value;
    }
    public function afterBasePrice(Subject $subject, $value)
    {
        if (!$this->_dataHelper->getGeneralConfig('enable')   ||
            !$this->_dataHelper->getGeneralConfig('base_price')) {
            return false;
        }
        return  $value;
    }
    public function afterFinalPrice(Subject $subject, $value)
    {
        if (!$this->_dataHelper->getGeneralConfig('enable')   ||
            !$this->_dataHelper->getGeneralConfig('final_price')) {
            return false;
        }
        return  $value;
    }
    public function afterSpecialPrice(Subject $subject, $value)
    {
        if (!$this->_dataHelper->getGeneralConfig('enable')   ||
            !$this->_dataHelper->getGeneralConfig('special_price')) {
            return false;
        }
        return  $value;
    }
    public function afterCatalogRulePrice(Subject $subject, $value)
    {
        if (!$this->_dataHelper->getGeneralConfig('enable')   ||
            !$this->_dataHelper->getGeneralConfig('catalog_rule_price')) {
            return false;
        }
        return  $value;
    }
}
