<?php

namespace Mod\ProductPage\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Custom extends AbstractHelper
{
    private $_availableSku = [
        'MJ01',
        'Mj01',
        'MJ02',
        'MJ04',
    ];

    public function validateProductBySku($sku)
    {
        if (in_array($sku, $this->getValidSkuArray())) {
            return true;
        } else {
            return false;
        }
    }

    protected function getValidSkuArray()
    {
        return $this->_availableSku;
    }
}
