<?php

namespace Mod\AdminModule\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_FIRSTMODULE = 'firstmodule/';

    public function getConfigValue($filed, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $filed,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_FIRSTMODULE . 'general/' . $code, $storeId);
    }
}
