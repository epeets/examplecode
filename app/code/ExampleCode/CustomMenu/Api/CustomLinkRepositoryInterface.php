<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Api;

use ExampleCode\CustomMenu\Api\Data\CustomLinkInterface;
use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomLinkRepositoryInterface
{
    public function save(CustomLinkInterface $customLink): CustomLinkInterface;

    public function getById($linkId): CustomLinkInterface;

    public function getByTitle($linkTitle): CustomLinkInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): CustomLinkSearchResultsInterface;

    public function delete($customLink);

    public function deleteById($linkId);
}
