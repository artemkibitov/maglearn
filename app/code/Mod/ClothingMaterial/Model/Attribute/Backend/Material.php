<?php

namespace Mod\ClothingMaterial\Model\Attribute\Backend;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Material extends AbstractBackend
{
    /**
     * Validate
     * @param Product $object
     * @throws  LocalizedException
     * @return bool
     */
    public function validate($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if (($object->getAttributeSetId() === 10) && ($value === 'wool')) {
            throw new LocalizedException(__('Bottom not can be wool.'));
        }
        return true;
    }
}
