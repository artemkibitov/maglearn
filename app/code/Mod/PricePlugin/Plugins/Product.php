<?php

namespace Mod\PricePlugin\Plugins;


class Product
{

    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {

        return $result . "plugin";
    }
}
