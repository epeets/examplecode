<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */

namespace ExampleCode\CustomMenu\Model\ResourceModel\CustomLink;

use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterface;
use ExampleCode\CustomMenu\Model\CustomLink;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink as CustomLinkResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection implements CustomLinkSearchResultsInterface
{
    public function setItems(array $items)
    {
        return $this;
    }

    public function getSearchCriteria()
    {
        return null;
    }

    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface|SearchCriteriaInterface $searchCriteria)
    {
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }

    protected function _construct()
    {
        $this->_init(CustomLink::class, CustomLinkResourceModel::class);
    }
}
