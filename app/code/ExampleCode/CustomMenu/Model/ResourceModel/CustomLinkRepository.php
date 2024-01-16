<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Model\ResourceModel;

use ExampleCode\CustomMenu\Api\CustomLinkRepositoryInterface;
use ExampleCode\CustomMenu\Api\Data\CustomLinkInterface;
use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterface;
use ExampleCode\CustomMenu\Api\Data\CustomLinkSearchResultsInterfaceFactory;
use ExampleCode\CustomMenu\Model\CustomLinkFactory;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink as CustomLinkResourceModel;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\State\InvalidTransitionException;
use Magento\Framework\Model\AbstractModel;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink\CollectionFactory;

class CustomLinkRepository implements CustomLinkRepositoryInterface
{
    private CustomLink $customLinkResourceModel;
    private CustomLinkFactory $customLinkFactory;
    private CollectionProcessorInterface $collectionProcessor;
    private CustomLinkSearchResultsInterfaceFactory $customLinkSearchResultsInterfaceFactory;

    public function __construct(
        CustomLinkResourceModel                 $customLinkResourceModel,
        CustomLinkFactory                       $customLinkFactory,
        CollectionProcessorInterface            $collectionProcessor,
        CustomLinkSearchResultsInterfaceFactory $customLinkSearchResultsInterfaceFactory
    ) {
        $this->customLinkResourceModel = $customLinkResourceModel;
        $this->customLinkFactory = $customLinkFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->customLinkSearchResultsInterfaceFactory = $customLinkSearchResultsInterfaceFactory;
    }

    /**
     *
     * @param CustomLinkInterface $customLink
     * @return CustomLinkInterface
     * @throws AlreadyExistsException
     * @throws CouldNotSaveException
     * @throws InvalidTransitionException
     * @throws LocalizedException
     */
    public function save(CustomLinkInterface $customLink): CustomLinkInterface
    {
        if (!($customLink instanceof AbstractModel)) {
            throw new CouldNotSaveException(__('The implementation of CustomLinkInterface has changed.'));
        }

        if ($this->ifLinkExist($customLink->getLinkTitle())) {
            throw new InvalidTransitionException(__('Custom link already exists.'));
        }

        try {
            $this->customLinkResourceModel->save($customLink);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            if ($e->getMessage() == (string)__('Custom link already exists.')) {
                throw new CouldNotSaveException(__('Custom link already exists.'));
            }

            throw $e;
        }

        return $customLink;
    }

    public function getById($linkId): CustomLinkInterface
    {
        /** @var \ExampleCode\CustomMenu\Model\CustomLink $customLink */
        $customLink = $this->customLinkFactory->create();
        $this->customLinkResourceModel->load($customLink, $linkId, CustomLinkInterface::LINK_ID);
        if (!$customLink) {
            throw new NoSuchEntityException(__('A link with the Id of "%1" doesn\'t exists.', $linkId));
        }

        return $customLink;
    }

    public function getByTitle($linkTitle): CustomLinkInterface
    {
        /** @var \ExampleCode\CustomMenu\Model\CustomLink $customLink */
        $customLink = $this->customLinkFactory->create();
        $this->customLinkResourceModel->load($customLink, $linkTitle, CustomLinkInterface::LINK_TITLE);
        if (!$customLink) {
            throw new NoSuchEntityException(__('A link with the title of "%1" doesn\'t exists.', $linkTitle));
        }

        return $customLink;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): CustomLinkSearchResultsInterface
    {
        /** @var CustomLinkSearchResultsInterface $searchResults */
        $searchResults = $this->customLinkSearchResultsInterfaceFactory->create();
        $this->collectionProcessor->process($searchCriteria, $searchResults);
        $searchResults->setSearchCriteria($searchCriteria);

        return $searchResults;
    }

    /**
     * @param mixed $linkId
     *
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function deleteById($linkId): bool
    {
        return $this->delete($this->getById($linkId));
    }

    /**
     * @param mixed $customLink
     *
     * @throws CouldNotSaveException
     */
    public function delete($customLink): bool
    {
        if (!$customLink instanceof AbstractModel) {
            throw new CouldNotSaveException(__('The implementation of CustomLinkInterface has changed.'));
        }

        try {
            $this->customLinkResourceModel->delete($customLink);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    private function ifLinkExist($linkTitle): bool
    {
        try {
            if ($this->getByTitle($linkTitle)) {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }
}
