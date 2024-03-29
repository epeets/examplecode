<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Ui\Component\Listing;

use Magento\Catalog\Ui\Component\FilterFactory;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\CollectionFactory;
use Magento\Framework\View\Element\UiComponent\ObserverInterface;
use Magento\Framework\View\Element\UiComponentInterface;

class Filters implements ObserverInterface
{
    protected FilterFactory $filterFactory;

    protected CollectionFactory $attributeCollectionFactory;

    public function __construct(
        FilterFactory $filterFactory,
        CollectionFactory $attributeCollectionFactory
    ) {
        $this->filterFactory = $filterFactory;
        $this->attributeCollectionFactory = $attributeCollectionFactory;
    }


    /**
     * @param UiComponentInterface $component
     * @return void
     */
    public function update(UiComponentInterface $component): void
    {
        if (!$component instanceof \Magento\Ui\Component\Filters) {
            return;
        }

        $attributeCodes = $component->getContext()->getRequestParam('attributes_codes');
        if ($attributeCodes) {
            foreach ($this->getAttributes($attributeCodes) as $attribute) {
                $filter = $this->filterFactory->create($attribute, $component->getContext());
                $filter->prepare();
                $component->addComponent($attribute->getAttributeCode(), $filter);
            }
        }
    }

    /**
     * @param $attributeCodes
     * @return mixed
     */
    protected function getAttributes($attributeCodes): mixed
    {
        $attributeCollection = $this->attributeCollectionFactory->create();

        return $attributeCollection->addFieldToFilter('attribute_code', ['in' => $attributeCodes]);
    }
}
