<?php

namespace Mod\AdminMultiSelect\Model\Adminhtml\System\Config\Source\Customer;

use Magento\Catalog\Helper\Category as CategoryHelper;
use Magento\Framework\Option\ArrayInterface;

class Group implements ArrayInterface
{
    protected $_categoryHelper;

    public function __construct(CategoryHelper $categoryHelper)
    {
        $this->_categoryHelper = $categoryHelper;
    }

    public function toOptionArray()
    {
        $options = [];
        $arr = $this->toArray();
        foreach ($arr as $key => $value) {
            $options[] = ['value' => $key, 'label' => $value];
        }
        return $options;
    }

    public function toArray()
    {
        $categoryList = [];
        $categories = $this->_categoryHelper->getStoreCategories(true, false, true);
        foreach ($categories as $category) {
            $categoryList[$category->getEntityId()] = __($category->getName());
        }

        return $categoryList;
    }
}
