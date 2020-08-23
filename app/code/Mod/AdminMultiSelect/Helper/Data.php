<?php

namespace Mod\AdminMultiSelect\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_MULTISELECT = 'multiselectmodule/general/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
                $field,
                ScopeInterface::SCOPE_STORE,
                $storeId
            );
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_MULTISELECT . $code, $storeId);
    }

    public function getSelectedCategory() : array
    {
        return explode(',', $this->getGeneralConfig('list'));
    }

    public function getEnable()
    {
        return $this->getGeneralConfig('enable');
    }
}
