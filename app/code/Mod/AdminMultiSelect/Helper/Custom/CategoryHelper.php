<?php

namespace Mod\AdminMultiSelect\Helper\Custom;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Helper\Category;
use Magento\Framework\Exception\NoSuchEntityException;

class CategoryHelper extends Category
{
    protected $_categoryCollectionFactory;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Data\CollectionFactory $dataCollectionFactory,
        CategoryRepositoryInterface $categoryRepository,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $collectionFactory
    ) {
        $this->_categoryCollectionFactory = $collectionFactory;

        parent::__construct($context, $categoryFactory, $storeManager, $dataCollectionFactory, $categoryRepository);
    }

    public function getCategoryName($categoryId)
    {
        try {
            return $this->categoryRepository->get($categoryId)->getName();
        } catch (NoSuchEntityException $e) {
            return false;
        }
    }

    public function getCategoryCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false)
    {
        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setStore($this->_storeManager->getStore());

        // select only active categories
        if ($isActive) {
            $collection->addIsActiveFilter();
        }

        // select categories of certain level
        if ($level) {
            $collection->addLevelFilter($level);
        }

        // sort categories by some value
        if ($sortBy) {
            $collection->addOrderField($sortBy);
        }

        // select certain number of categories
        if ($pageSize) {
            $collection->setPageSize($pageSize);
        }

        return $collection;
    }

    public function productCount($category, $all = false)
    {
        if($all) {
            return $category->getProductCount();
        }
        return ' ('.$category->getProductCollection()->count().')';
    }
    public function getCategoryFactory()
    {
        return $this->_categoryFactory;
    }
}
