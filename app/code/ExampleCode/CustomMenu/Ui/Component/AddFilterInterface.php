<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Ui\Component;

use Magento\Framework\Api\Filter;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;

interface AddFilterInterface
{
    /**
     * Adds custom filter to search criteria builder based on received filter.
     */
    public function addFilter(SearchCriteriaBuilder $searchCriteriaBuilder, Filter $filter);
}
