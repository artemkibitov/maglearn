<?php


namespace Mod\First\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Mod\First\Model\PostFactory;
class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'name'      => 'magento2 crud',
            'post_content' => 'install data content',
            'url_key'   => '/install-key',
            'tags'      => 'magento2, installData',
            'status'    => 1
        ];
    }
}