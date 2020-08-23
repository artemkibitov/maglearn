<?php

namespace Mod\AdminMultiSelect\Plugin;

class ProductAttribute
{
    protected $dataHelper;

    public function __construct(\Mod\AdminMultiSelect\Helper\Data $dataHelper)
    {
        $this->dataHelper = $dataHelper;
    }

    public function afterView(\Magento\Catalog\Block\Product\View $subject, $name)
    {
        if (in_array($subject->getProduct()->getCategoryId(), $this->dataHelper->getSelectedCategory()) && !!$this->dataHelper->getEnable()) {
            return $name;
        }
        return false;
    }
}
