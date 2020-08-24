<?php

namespace Mod\AdminModule\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Mod\AdminModule\Helper\Data;

class Config extends Action
{
    protected $_helperData;

    public function __construct(Context $context, Data $helperData)
    {
        $this->_helperData = $helperData;
        parent::__construct($context);
    }

    public function execute()
    {
        phpinfo();
        exit();
    }
}
