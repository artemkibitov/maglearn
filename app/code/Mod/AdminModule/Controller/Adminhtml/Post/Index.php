<?php

namespace Mod\AdminModule\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_resultFactory = false;

    public function __construct(Context $context, PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->_resultFactory = $resultFactory;
    }

    public function execute()
    {
        $resultPage = $this->_resultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Posts')));

        return $resultPage;
    }
}
