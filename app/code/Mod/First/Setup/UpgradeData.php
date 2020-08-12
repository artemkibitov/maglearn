<?php

namespace Mod\First\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Mod\First\Model\PostFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.1.4', '<')) {
            $firstData = [
                    'name' => 'Magento 2 Upgarde Schema',
                    'post_content' => 'this content created for update Data script',
                    'url_key' => '/fake_url_key',
                    'tags'  => 'magento2',
                    'category' => 'upgrade Schema',
                    'status' => 1,
                    'option' => 'super_option'
                ];
               $nextData =  [
                    'name' => 'Next Post for Magento 2 Upgarde Schema',
                    'post_content' => 'this content created for update Data script, to post 2',
                    'url_key' => '/fake-url-key',
                    'tags'  => 'magento2',
                    'category' => 'upgrade Schema',
                    'status' => 1,
                    'option' => 'super_option'
                ];


            $post = $this->_postFactory->create();
            $post->addData($firstData)->save();
            $post->addData($nextData)->save();
        }
    }
}
