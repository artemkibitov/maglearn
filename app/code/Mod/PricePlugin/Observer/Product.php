<?php

namespace Mod\PricePlugin\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Product implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getData('collection');
        $phrase = "\nObserver say:\t";
        foreach ($collection as $product) {
//            $price = $product->getData('price');
            $name = $product->getData('name');
            $name .= ' lolz';
//            if ($price < 60) {
//                $name .= $phrase . "low price\t\n";
//            } else {
//                $name .= $phrase . "high price\t\n";
            }

            $product->setData('name', $name);
        }
}
