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
        return implode(' ; ', $this->_priceHelper->getRulePrice($this->getProduct()->getId()));
    }
    public function basePrice()
    {
        return $this->getProduct()->getPrice();
    }

    public function view()
    {
        return [
          'Base Price'         => $this->basePrice(),
          'Tier Price'         => $this->tierPrice(),
          'final Price'        => $this->finalPrice(),
          'special Price'      => $this->specialPrice(),
          'catalog rule Price' => $this->catalogRulePrice(),
        ];
    }
}


/**
<?php if ($block->basePrice()): ?>
<p><span style="font-weight: bolder; border-bottom: 2px solid <?=$colorize[$count++]?>">base price :</span> <?=$block->basePrice()?></p>
<?php endif; ?>
<?php if ($block->tierPrice()): ?>
<p><span style="font-weight: bolder; border-bottom: 2px solid <?=$colorize[$count++]?>">tier price :</span> <?=($block->tierPrice());?></p>
<?php endif; ?>
<?php if ($block->finalPrice()): ?>
<p><span style="font-weight: bolder; border-bottom: 2px solid <?=$colorize[$count++]?>">final price :</span> <?=$block->finalPrice();?></p>
<?php endif; ?>
<?php if ($block->specialPrice()): ?>
<p><span style="font-weight: bolder; border-bottom: 2px solid <?=$colorize[$count++]?>">special price :</span> <?=$block->specialPrice();?></p>
<?php endif; ?>
<?php if ($block->catalogRulePrice()): ?>
<p><span style="font-weight: bolder; border-bottom: 2px solid <?=$colorize[$count++]?>">catalog rule price:</span> <?=$block->catalogRulePrice();?></p>
<?php endif; ?>
 */
