<?php

namespace Mod\AdminMultiSelect\Model\Adminhtml\System\Config\Source\Customer;

use Magento\Framework\Data\OptionSourceInterface;
use Mod\AdminMultiSelect\Helper\Custom\CategoryHelper;

class Group implements OptionSourceInterface
{
    protected $_categoryHelper;

//    protected $_categoryFactory;
//
//    protected $_categoryCollectionFactory;

    public function __construct(CategoryHelper $categoryHelper)
    {
        $this->_categoryHelper = $categoryHelper;
    }

    public function toOptionArray()
    {
        $options = [];

        foreach ($this->_toArray() as $key => $value) {
            $options[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $options;
    }

    private function _toArray()
    {
        $categoryList = [];
        $categories = $this->_categoryHelper->getCategoryCollection(true, false, false, false);
        foreach ($categories as $category) {
            $categoryList[$category->getEntityId()] =
                __($this->_getParentName($category->getPath()) . $category->getName() .
                    $this->_categoryHelper->productCount($category));
        }

        return $categoryList;
    }

    private function _getParentName($path = '')
    {
        $parentName = '';
        $rootCats = [1,2];
        $catTree = explode("/", $path);
        array_pop($catTree);
        if ($catTree && (count($catTree) > count($rootCats))) {
            foreach ($catTree as $catId) {
                if (!in_array($catId, $rootCats)) {
                    $category = $this->_categoryHelper->getCategoryFactory()->create()->load($catId);
                    $categoryName = $category->getName();
                    $parentName .= $categoryName . ' -> ';
                }
            }
        }
        return $parentName;
    }
}
