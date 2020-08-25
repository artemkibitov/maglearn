<?php

namespace Mod\PriceView\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Mod\PriceView\Model\PriceModel;

class priceHelper extends AbstractHelper
{
    protected $_priceModel;
    public function __construct(Context $context, PriceModel $priceModel)
    {
        $this->_priceModel = $priceModel;
        parent::__construct($context);
    }

    /**
     * @param array $tierPrice
     * @return string
     * @var array $item
     */
    public function FormatTierPrice(array $tierPrice)
    {
        $result = [];
        foreach ($tierPrice as $item) {
            foreach ($item as $key => $value) {
                if ($key === 'price') {
                    $result[] = $value;
                    break;
                }
            }
        }

        if (count($result) === 1) {
            return $result[0];
        }
        return implode('; ', $result);
    }

    public function getRulesFromProduct($productId, $customerGroupId = 3, $websiteId = 1)
    {
        $date = (new \DateTime(date('Y-m-d')))->format('Y-m-d');
        return $this->_priceModel->getRulesFromProduct($date, $websiteId, $customerGroupId, $productId);
    }

    public function getRulePrice($productId, $customerGroupId = 3, $websiteId = 1)
    {
        $date = new \DateTime(date('Y-m-d'));
        return $this->_priceModel->getRulePrices($date, $websiteId, $customerGroupId, [$productId]);
    }
}
