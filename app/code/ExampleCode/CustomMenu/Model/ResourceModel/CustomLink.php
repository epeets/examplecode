<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomLink extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('example_menu_custom_links', 'link_id');
    }
}
