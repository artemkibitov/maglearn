<?php

namespace Mod\CustomPrice\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Mod\CustomPrice\Helper\CustomPriceHelper;

class CustomPrice extends AbstractModifier
{
    const FIELD_CUSTOM_PRICE = 'custom_price';

    /**
     * @var CustomPriceHelper
     */
    private $_customPriceHelper;

    /**
     * CustomPrice constructor.
     * @param CustomPriceHelper $customPriceHelper
     */
    public function __construct(CustomPriceHelper $customPriceHelper)
    {
        $this->_customPriceHelper = $customPriceHelper;
    }

    /**
     * @param array $data
     * @return array
     */
    public function modifyData(array $data)
    {
        return $this->_customPriceHelper->customPriceDefaultSet($data);
    }

    /**
     * @param array $meta
     * @return array
     */
    public function modifyMeta(array $meta)
    {
        return $this->_customPriceHelper->customPriceFieldSet($meta);
    }
}
