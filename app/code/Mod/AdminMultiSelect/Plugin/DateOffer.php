<?php

namespace Mod\AdminMultiSelect\Plugin;


class DateOffer
{
    protected $dataHelper;

    public function __construct(\Mod\AdminMultiSelect\Helper\Data $dataHelper)
    {
        $this->dataHelper = $dataHelper;
    }

    public function afterSpecialOffer(\Magento\Catalog\Block\Product\View $subject, $result)
    {
        if (!$this->dataHelper->getEnable()) {
            return $result;
        }

        $timeNow = new \DateTime(date('Y-m-d'));

        $selectedDate = new \DateTime($this->dataHelper->getDateConfig());
        $result = $selectedDate >= $timeNow;
        return $result;
    }
}
