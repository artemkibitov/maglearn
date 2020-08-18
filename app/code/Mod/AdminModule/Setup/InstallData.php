<?php

namespace Mod\AdminModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Mod\AdminModule\Model\PostFactory;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** еще не разбирался с методами сохранения в БД, поэтому такой срач */
        $data = [
            'name'      => 'magento2 crud',
            'post_content' => 'install data content',
            'url_key'   => '/install-key',
            'tags'      => 'magento2, installData',
            'status'    => 1
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
        $data = [
            'name'      => 'magento2 crudada',
            'post_content' => 'next install data content',
            'url_key'   => '/installs-key',
            'tags'      => 'magento2',
            'status'    => 1
        ];
        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}
