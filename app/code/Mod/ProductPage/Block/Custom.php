<?php

namespace Mod\ProductPage\Block;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\View;
use Magento\Framework\Stdlib\StringUtils;
use Magento\Framework\Url\EncoderInterface;
use Mod\ProductPage\Helper\Custom as CustomHelper;

class Custom extends View
{
    /** @var CustomHelper */
    protected $_customHelper;

    public function __construct(
        Context $context,
        EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        CustomHelper $customHelper,
        array $data = []
    ) {
        $this->_customHelper = $customHelper;
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
    }

    public function getAnyCustomValue()
    {
        $currentProduct = $this->getProduct();
        $customValue = 'Any Value : ';
        return $customValue . $currentProduct->getFinalPrice();
    }

    public function isAvailable()
    {
        $currentProduct = $this->getProduct();
        return $this->_customHelper->validateProductBySku($currentProduct->getSku());
    }
}
