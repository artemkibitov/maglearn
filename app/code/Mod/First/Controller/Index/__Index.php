<?php









//namespace Mod\First\Controller\Index;
//
//use Mod\First\Model\ResourceModel\Post\Collection;
//
//class Index extends \Magento\Framework\App\Action\Action
//{
//    protected $_pageFactory;
//    protected $_postFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory,
//        \Mod\First\Model\ResourceModel\PostFactory $postFactory
//    ) {
//        $this->_pageFactory = $pageFactory;
//        $this->_postFactory = $postFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        $post = $this->_postFactory->create();
//        $collection = $post->getCollection();
//        foreach ($collection as $item) {
//            echo '<pre>';
//            print_r($item->getData());
//            echo '</pre>';
//        }
//        exit();
//        return $this->_pageFactory->create();
//    }
//}
//namespace Mod\First\Controller\Index;
//
//use Magento\Framework\App\Action\Action;
//use Magento\Framework\View\Result\PageFactory;
//use Mod\First\Model\ResourceModel\Post\CollectionFactory as ProductCollectionFactory;
//use Mod\First\Model\ResourceModel\PostFactory;
//
//class Index extends Action
//{
//    /**
//     * @var PageFactory
//     */
//    protected $_pageFactory;
//
//    /**
//     * @var ProductCollectionFactory
//     */
//    protected $_productCollection;
//
//    /**
//     * @var PostFactory
//     */
//    protected $_postFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        PageFactory $pageFactory,
//        PostFactory $postFactory,
//        ProductCollectionFactory $productCollection
//    ) {
//        $this->_productCollection = $productCollection;
//        $this->_pageFactory = $pageFactory;
//        $this->_postFactory = $postFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        $post = $this->_postFactory->create();
//        $collection = $post->getCollection();
//        foreach ($collection as $item) {
//            echo '<pre>';
//            print_r($item->getData());
//            echo '</pre>';
//        }
//        exit();
//        return $this->_pageFactory->create();
//    }
//}
//
//
//
