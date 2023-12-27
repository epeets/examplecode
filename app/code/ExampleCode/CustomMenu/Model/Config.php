<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */

namespace ExampleCode\CustomMenu\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    public const XML_PATH_EXAMPLE_ADMIN_CONFIGURATION_ENABLED = 'examplecode_custom_menu/general/enabled';

    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_EXAMPLE_ADMIN_CONFIGURATION_ENABLED,
            $storeScope
        );
    }
}
