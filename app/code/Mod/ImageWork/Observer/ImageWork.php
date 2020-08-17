<?php


namespace Mod\ImageWork\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ImageWork implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('data_text');
        echo $displayText->getText() . " observer event \n"."<br>";
        $displayText->setText('new text in observer');
        return $this;
    }
}