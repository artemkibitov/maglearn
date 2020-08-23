<?php

namespace Mod\AdminMultiSelect\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Mod\AdminMultiSelect\Helper\Custom\CategoryHelper;

class AttributeTitle extends \Magento\Catalog\Block\Product\View
{

    /**
     * @var CategoryHelper
     */
    protected $_categoryHelper;
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
        CategoryHelper $categoryHelper,
        array $data = []
    ) {
        $this->_categoryHelper = $categoryHelper;
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

    public function view()
    {
        return [
            'category_name' => $this->categoryName(),
            'category_id'   => $this->getCategoryId(),
            'Sku'           => $this->getSku(),
            'Type'          => $this->getType()
        ];
    }

    protected function categoryName()
    {
        return $this->_categoryHelper->getCategoryName($this->getCategoryId());
    }

    protected function getCategoryId()
    {
        return $this->getProduct()->getCategoryId();
    }

    protected function getSku()
    {
        return $this->getProduct()->getSku();
    }

    protected function getType()
    {
        if(gettype($this->getProduct()->getTypeId()) === 'array') {
            return implode(',',$this->getProduct()->getTypeId());
        }
        return $this->getProduct()->getTypeId();
    }
}
