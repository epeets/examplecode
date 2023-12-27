<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */

namespace ExampleCode\CustomMenu\Model;

use ExampleCode\CustomMenu\Api\Data\CustomLinkInterface;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink as CustomLinkResourceModel;
use Magento\Framework\Model\AbstractModel;

class CustomLink extends AbstractModel implements CustomLinkInterface
{
    public function getLinkId(): int
    {
        return $this->getData(self::LINK_ID);
    }

    public function setLinkId($linkId): CustomLinkInterface
    {
        $this->setData(self::LINK_ID, $linkId);

        return $this;
    }

    public function getLinkTitle(): string
    {
        return $this->getData(self::LINK_TITLE);
    }

    public function setLinkTitle($linkTitle): CustomLinkInterface
    {
        $this->setData(self::LINK_TITLE, $linkTitle);

        return $this;
    }

    public function getLinkUrl(): string
    {
        return $this->getData(self::LINK_URL);
    }

    public function setLinkUrl($linkUrl): CustomLinkInterface
    {
        $this->setData(self::LINK_URL, $linkUrl);

        return $this;
    }

    protected function _construct()
    {
        $this->_init(CustomLinkResourceModel::class);
    }
}
