<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */

namespace ExampleCode\CustomMenu\Ui\DataProvider\Links\Listing\Column;

use Magento\Catalog\Ui\Component\ColumnFactory;
use Magento\Catalog\Ui\Component\Listing\Attribute\RepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * Default columns max order value.
     */
    public const DEFAULT_COLUMNS_MAX_ORDER = 100;

    protected RepositoryInterface $attributeRepository;

    protected array $filterMap = [
        'default' => 'text',
        'select' => 'select',
        'boolean' => 'select',
        'multiselect' => 'select',
        'date' => 'dateRange',
        'datetime' => 'datetimeRange',
    ];

    private ColumnFactory $columnFactory;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        ColumnFactory $columnFactory,
        RepositoryInterface $attributeRepository,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->columnFactory = $columnFactory;
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @throws LocalizedException
     */
    public function prepare(): void
    {
        $columnSortOrder = self::DEFAULT_COLUMNS_MAX_ORDER;
        foreach ($this->attributeRepository->getList() as $attribute) {
            $config = [];
            if (!isset($this->components[$attribute->getAttributeCode()])) {
                $config['sortOrder'] = ++$columnSortOrder;
                if ($attribute->getIsFilterableInGrid()) {
                    $config['filter'] = $this->getFilterType($attribute->getFrontendInput());
                }
                $column = $this->columnFactory->create($attribute, $this->getContext(), $config);
                $column->prepare();
                $this->addComponent($attribute->getAttributeCode(), $column);
            }
        }
        parent::prepare();
    }

    /**
     * Retrieve filter type by $frontendInput.
     *
     * @param string $frontendInput
     */
    protected function getFilterType($frontendInput): string
    {
        return $this->filterMap[$frontendInput] ?? $this->filterMap['default'];
    }
}
