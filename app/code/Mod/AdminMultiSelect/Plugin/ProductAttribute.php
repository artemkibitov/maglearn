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
        $categoryId = $subject->getProduct()->getCategoryId() ?: $subject->getProduct()->getCategoryIds()[0];

        if (in_array($categoryId, $this->dataHelper->getSelectedCategory()) && !!$this->dataHelper->getEnable()) {
            return $name;
        }
        return false;
    }
}
