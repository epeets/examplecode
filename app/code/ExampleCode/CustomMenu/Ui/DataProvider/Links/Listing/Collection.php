<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */

namespace ExampleCode\CustomMenu\Ui\DataProvider\Links\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    protected function _initSelect(): void
    {
        parent::_initSelect();
    }
}
