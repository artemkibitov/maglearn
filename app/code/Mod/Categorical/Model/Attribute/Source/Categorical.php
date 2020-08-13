<?php

namespace Mod\Categorical\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Categorical extends AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('First'), 'value' => 'first'],
                ['label' => __('Next'), 'value' => 'next'],
           ];
        }
        return $this->_options;
    }
}
