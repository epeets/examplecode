<?php
/**
 *
 * Project: Magento Example
 * Author: Eshcole Peets
 *
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Model;

use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

class CustomLinkSearchResults extends SearchResults implements CustomLinkSearchResultsInterface
{

}
