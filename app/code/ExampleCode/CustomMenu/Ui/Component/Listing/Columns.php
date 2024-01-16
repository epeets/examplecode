<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Ui\Component\Listing;

use Magento\Catalog\Ui\Component\ColumnFactory;
use Magento\Catalog\Ui\Component\Listing\Attribute\RepositoryInterface;

class Columns extends \Magento\Ui\Component\Listing\Columns
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

    /**
     * @var ColumnFactory
     */
    private ColumnFactory $columnFactory;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        ColumnFactory $columnFactory,
        RepositoryInterface $attributeRepository,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $components, $data);
        $this->columnFactory = $columnFactory;
        $this->attributeRepository = $attributeRepository;
    }

    public function prepare()
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
     *
     * @return string
     */
    protected function getFilterType($frontendInput)
    {
        return $this->filterMap[$frontendInput] ?? $this->filterMap['default'];
    }
}
