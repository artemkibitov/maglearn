<?php

namespace Mod\GetProduct\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template;

class IndexResource extends Template
{
    protected $_productFactory;

    protected $_productResource;

    protected $_productCollectionFactory;

    public function __construct(
        ProductFactory $productFactory,
        Product $productResource,
        CollectionFactory $productCollectionFactory,
        Template\Context $context,
        array $data = []
    ) {
        $this->_productFactory = $productFactory;
        $this->_productResource = $productResource;
        $this->_productCollectionFactory = $productCollectionFactory;

        parent::__construct($context, $data);
    }

    public function getProductById($productId)
    {
        if (is_null($productId)) {
            return null;
        }

        $productModel = $this->_productFactory->create();
        $this->_productResource->load($productModel, $productId);
        return  $productModel;
    }

    public function getCheapProducts($price)
    {
        if (is_null($price)) {
            return [];
        }

        $productCollection = $this->_productCollectionFactory->create();
        $productCollection->addAttributeToSelect('*')
            ->addAttributeToFilter(ProductInterface::PRICE, ['lt'=> $price])
            ->load();

        return $productCollection->getItems();
    }
}
