<?php

namespace Mod\AdminMultiSelect\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_MULTISELECT = 'multiselectmodule/general/';
    const XML_PATH_DATE = 'yotpo/sync_settings/orders_sync_start_date';


    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_MULTISELECT . $code, $storeId);
    }

    public function getDateConfig()
    {
        return $this->getConfigValue( self::XML_PATH_DATE);
//        return $this->getGeneralConfig('datePicker');
    }


    public function getSelectedCategory() : array
    {
        return explode(',', $this->getGeneralConfig('list'));
    }

    public function getEnable()
    {
        return $this->getGeneralConfig('enable');
    }

    protected function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

}
