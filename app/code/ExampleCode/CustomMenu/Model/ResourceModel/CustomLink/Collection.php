<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Model\ResourceModel\CustomLink;

use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterface;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink as CustomLinkResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection implements CustomLinkSearchResultsInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\ExampleCode\CustomMenu\Model\CustomLink::class, CustomLinkResourceModel::class);
    }

    /**
     * @param array $items
     * @return $this|mixed
     */
    public function setItems(array $items = null)
    {
        return $this;
    }

    /**
     * @return null
     */
    public function getSearchCriteria()
    {
        return null;
    }

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return $this|Collection
     */
    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * @param $totalCount
     * @return $this|Collection
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

}
