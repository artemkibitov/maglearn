<?php


namespace Mod\First\Block\Adminhtml;

use Magento\Backend\Block\Template;

class Hello extends Template
{
    public function two()
    {
        return 1+1;
    }
}