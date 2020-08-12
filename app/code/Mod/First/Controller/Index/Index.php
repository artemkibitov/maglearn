<?php

namespace Mod\First\Controller\Index;

use Mod\First\Model\ResourceModel\Post;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    protected $_collectionFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Mod\First\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        \Mod\First\Model\PostFactory $postFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_collectionFactory = $collectionFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->_collectionFactory->create();
        $collection->addCategoryFilter()->getSelect();
        foreach ($collection as $item) {
        print_r($item);
        }

        //        $post = $this->_postFactory->create();
//        $collection = $post->getCollection();
//        foreach ($collection as $item) {
//
//            echo "<pre>";
//            print_r($item->getDefaultValues());
//            echo "</pre>";
//        }
//        exit();
//        return $this->_pageFactory->create();
    }
}
