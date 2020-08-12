<?php

namespace Mod\First\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'mod_first_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mod\First\Model\Post', 'Mod\First\Model\ResourceModel\Post');
    }

    public function addCategoryFilter($category = 'CRUD')
    {
        $this->addFieldToFilter('category', $category);
        return $this;
    }
}
