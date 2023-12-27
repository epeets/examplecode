<?php
/**
 *
 * Project: Magento Example
 * Author: Eshcole Peets
 *
 */

namespace ExampleCode\CustomMenu\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CustomLinkSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return CustomLinkInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return mixed
     */
    public function setItems(array $items);
}
