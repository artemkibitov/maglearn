<?php


namespace Mod\First\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Fire implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        echo 'Done';
    }
}