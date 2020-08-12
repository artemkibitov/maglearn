<?php

namespace Mod\GetProduct\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class IndexRepository extends Template
{
    /** @var \Magento\Catalog\Api\ProductRepositoryInterface */
    protected $_productRepository;
    /** @var \Magento\Framework\Api\SearchCriteriaBuilder */
    protected $_searchCriteriaBuilder;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        Context $context,
        array $data = []
    ) {
        $this->_productRepository = $productRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getProductById($productId)
    {
        if (is_null($productId)) {
            return null;
        }

        return $this->_productRepository->getById($productId);
    }

    /** @return array|ProductInterface */
    public function getCheapProducts($price)
    {
        if (is_null($price)) {
            return [];
        }
        $this->_searchCriteriaBuilder->addFilter(
            ProductInterface::PRICE,
            $price,
            'lt'
        );
        $searchCriteria = $this->_searchCriteriaBuilder->create();
        $productCollection = $this->_productRepository->getList($searchCriteria);

        return $productCollection->getItems();
    }
}
