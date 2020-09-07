<?php

namespace Mod\CustomPrice\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Stdlib\ArrayManager;
use Magento\Ui\Component\Form\Element\Checkbox;
use Magento\Ui\Component\Form\Field;

class CustomPriceHelper extends AbstractHelper
{
    const FIELD_CUSTOM_PRICE = 'custom_price';

    /**
     * @var ArrayManager $arrayManager
     */
    protected $arrayManager;

    /**
     * CustomPriceHelper constructor.
     * @param Context $context
     * @param ArrayManager $arrayManager
     */

    public function __construct(Context $context, ArrayManager $arrayManager)
    {
        $this->arrayManager = $arrayManager;

        parent::__construct($context);
    }

    /**
     * @param array $meta
     * @return array
     */
    public function customPriceFieldSet(array $meta) : array
    {
        $pricePath = $this->arrayManager->findPath(
            self::FIELD_CUSTOM_PRICE,
            $meta,
            null,
            'children'
        );

        if ($pricePath) {
            $meta = $this->arrayManager->merge(
                $pricePath . '/arguments/data/config',
                $meta,
                [
                    'additionalClasses' => 'admin__field-small',
                    'component' => 'Mod_CustomPrice/js/form/element/custom-checkbox'
                ]
            );
        }

        $containerPath = $this->arrayManager->findPath(
            'container_' . static::FIELD_CUSTOM_PRICE,
            $meta,
            null,
            'children'
        );

        $fieldPath = $this->arrayManager->findPath(static::FIELD_CUSTOM_PRICE, $meta, null, 'children');
        $fieldConfig = $this->arrayManager->get($fieldPath, $meta);

        $meta = $this->arrayManager->merge(
            $containerPath,
            $meta,
            [
                'children' => [
                    static::FIELD_CUSTOM_PRICE => [
                        'arguments' => [
                            'data' => [
                                'config' => [
                                    'dataScope' => static::FIELD_CUSTOM_PRICE,
                                    'additionalClasses' => 'admin__field-x-small',
                                    'component' => 'Mod_CustomPrice/js/form/element/custom-checkbox',
                                    'componentType' => Field::NAME,
                                    'prefer' => 'text',
                                    'value' => 50
                                ],
                            ],
                        ],
                    ],
                    'use_config_' . static::FIELD_CUSTOM_PRICE => [
                        'arguments' => [
                            'data' => [
                                'config' => [
                                    'dataType' => 'number',
                                    'formElement' => Checkbox::NAME,
                                    'componentType' => Field::NAME,
                                    'description' => __('Allow Modify'),
                                    'dataScope' => 'use_config_' . static::FIELD_CUSTOM_PRICE,
                                    'value' => 'true',
                                    'valueMap' => [
                                        'false' => '0',
                                        'true' => '1',
                                    ],
                                    'exports' => [
                                        'checked' => '${$.parentName}.' . static::FIELD_CUSTOM_PRICE
                                            . ':isUseConfig',
                                    ],
                                    'imports' => [
                                        'disabled' => '${$.parentName}.' . static::FIELD_CUSTOM_PRICE
                                            . ':isUseDefault',
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        return $meta;
    }

    /**
     * @param array $data
     * @param int $percent
     * @return array
     */
    public function customPriceDefaultSet(array $data, int $percent = 15) : array
    {
        $findPath = $this->arrayManager
            ->findPath(self::FIELD_CUSTOM_PRICE, $data, null, 'product');

        if (!$findPath) {
            $productPath = $this->arrayManager->findPath('product', $data, null);
            $price = (int) $this->arrayManager->get($productPath . '/price', $data, null);
            $customPrice = $price + $this->calcPercent($price, $percent);
            $data = $this->arrayManager
                ->merge($productPath, $data, [self::FIELD_CUSTOM_PRICE => (string) $customPrice]);
        }

        return  $data;
    }

    /**
     * @param int $value
     * @param int $percent
     * @return int
     */
    private function calcPercent(int $value, int $percent = 15) : int
    {
        return ($value * 0.1) * ($percent * 0.1);
    }
}
