<?php

namespace Mod\PricePlugin\Plugins;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $product, $name)
    {
        $price = $product->getData('price');
        if ($price < 60) {
            $name .= "\tgood price!";
        } else {
            $name .= "\tover price!";
        }
        return $name;
    }
}