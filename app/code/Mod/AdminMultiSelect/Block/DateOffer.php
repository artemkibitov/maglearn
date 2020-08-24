<?php

namespace Mod\AdminMultiSelect\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Mod\AdminMultiSelect\Helper\Data as DataHelper;

class DateOffer extends \Magento\Catalog\Block\Product\View
{
    /**
     * @var DataHelper
     */
    private $_dataHelper;

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
        DataHelper $DataHelper,
        array $data = []
    ) {
        $this->_dataHelper = $DataHelper;
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

    public function specialOffer()
    {
        return false;
    }

    public function tellTheOfferTime()
    {
        return $this->_dataHelper->getDateConfig();
    }
}
