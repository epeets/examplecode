<?php
/**
 * Project: Magento Example
 * Author: Eshcole Peets
 */

namespace ExampleCode\CustomMenu\Api\Data;

interface CustomLinkInterface
{
    public const LINK_ID = 'link_id';
    public const LINK_TITLE = 'link_title';
    public const LINK_URL = 'link_url';
    public const ATTRIBUTES = [
        self::LINK_ID,
        self::LINK_TITLE,
        self::LINK_URL,
    ];

    /**
     * @return int
     */
    public function getLinkId(): int;

    /**
     * @param $linkId
     * @return $this
     */
    public function setLinkId($linkId): CustomLinkInterface;

    /**
     * @return string
     */
    public function getLinkTitle(): string;

    /**
     * @param $linkTitle
     * @return $this
     */
    public function setLinkTitle($linkTitle): CustomLinkInterface;

    /**
     * @return string
     */
    public function getLinkUrl(): string;

    /**
     * @param $linkUrl
     * @return $this
     */
    public function setLinkUrl($linkUrl): CustomLinkInterface;
}
