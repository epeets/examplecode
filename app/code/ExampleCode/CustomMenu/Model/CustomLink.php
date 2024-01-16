<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets.
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Model;

use ExampleCode\CustomMenu\Api\Data\CustomLinkInterface;
use ExampleCode\CustomMenu\Model\ResourceModel\CustomLink as CustomLinkResourceModel;
use Magento\Framework\Model\AbstractModel;

class CustomLink extends AbstractModel implements CustomLinkInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(CustomLinkResourceModel::class);
    }

    /**
     * @return int
     */
    public function getLinkId(): int
    {
        return $this->getData(self::LINK_ID);
    }

    /**
     * @param $linkId
     * @return CustomLinkInterface
     */
    public function setLinkId($linkId): CustomLinkInterface
    {
        $this->setData(self::LINK_ID, $linkId);

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkTitle(): string
    {
        return $this->getData(self::LINK_TITLE);
    }

    /**
     * @param $linkTitle
     * @return CustomLinkInterface
     */
    public function setLinkTitle($linkTitle): CustomLinkInterface
    {
        $this->setData(self::LINK_TITLE, $linkTitle);

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkUrl(): string
    {
        return $this->getData(self::LINK_URL);
    }

    /**
     * @param $linkUrl
     * @return CustomLinkInterface
     */
    public function setLinkUrl($linkUrl): CustomLinkInterface
    {
        $this->setData(self::LINK_URL, $linkUrl);

        return $this;
    }
}
