<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */

namespace ExampleCode\CustomMenu\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomLink extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('example_menu_custom_links', 'link_id');
    }
}
