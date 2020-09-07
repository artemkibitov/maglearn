<?php


namespace Mod\CustomPrice\Model\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;

class AllowModify extends AbstractBackend
{
    /**
     * checkAllow
     * @param \Magento\Catalog\Model\Product $object
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return bool
     */
    public function checkAllow(\Magento\Catalog\Model\Product $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        return  true;
    }
}
