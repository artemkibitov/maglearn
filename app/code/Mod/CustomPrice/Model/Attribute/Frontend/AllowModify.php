<?php


namespace Mod\CustomPrice\Model\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;

class AllowModify extends AbstractFrontend
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
