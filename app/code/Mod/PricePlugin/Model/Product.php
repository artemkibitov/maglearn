<?php

namespace Mod\PricePlugin\Model;

class Product extends \Magento\Catalog\Model\Product
{

    public function getName()
    {
        $name = parent::getName();
        $price = $this->getData('price');
        if ($price < 60) {
            $name .= "\tpreference low price";
        } else {
            $name .= "\tpreference over price";
        }
        return $name;
    }

}
