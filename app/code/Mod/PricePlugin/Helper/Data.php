<?php


namespace Mod\PricePlugin\Helper;



class Data
{
    public function __construct(\Mod\CustomHelper\Helper\Data $helper)
    {
        $this->_helper = $helper;
    }

    public function one()
    {
        return $this->_helper->HelperFunc();
    }
}