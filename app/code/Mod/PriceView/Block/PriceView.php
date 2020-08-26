<?php

namespace Mod\PriceView\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\View;
use Mod\PriceView\Helper\priceHelper;

class PriceView extends View
{
    protected $_priceHelper;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        priceHelper $priceHelper,
        array $data = []
    ) {
        $this->_priceHelper = $priceHelper;
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

    public function tierPrice()
    {
        if (!$this->getProduct()->getTierPrice()) return null;
        return $this->_priceHelper->FormatTierPrice($this->getProduct()->getTierPrice());
    }
    public function finalPrice()
    {
        return $this->getProduct()->getFinalPrice();
    }
    public function specialPrice()
    {
        return $this->getProduct()->getSpecialPrice();
    }

    public function catalogRulePrice()
    {
        if (!$this->_priceHelper->getRulePrice($this->getProduct()->getId())) return  null;
        return implode(' ; ', $this->_priceHelper->getRulePrice($this->getProduct()->getId()));
    }

    public function basePrice()
    {
        return $this->getProduct()->getPrice();
    }

    //баловство
    public function colorize()
    {
        return ['#0077c2','#00bcd4','#dce775','#f57f17','#90a4ae'];
    }

}
