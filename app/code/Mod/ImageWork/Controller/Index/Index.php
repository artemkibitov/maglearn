<?php

namespace Mod\ImageWork\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    protected $_collectionFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(['text' => 'текст']);
        $this->_eventManager->dispatch('mod_imagework_display_text', ['data_text' => $textDisplay]);
        echo $textDisplay->getText();
        return $this->_pageFactory->create();
    }
}
