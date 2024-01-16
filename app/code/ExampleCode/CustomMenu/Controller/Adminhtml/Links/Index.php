<?php
/**
 *
 * Project: Magento Example
 * Author: Eshcole Peets
 *
 */
declare(strict_types=1);

namespace ExampleCode\CustomMenu\Controller\Adminhtml\Links;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'ExampleCode_CustomMenu::config';

    /**
     * @var PageFactory
     */
    private PageFactory $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context     $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return Page
     */
    public function execute(): Page
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('ExampleCode_CustomMenu::links');
        $resultPage->addBreadcrumb(__('Custom Menu'), __('Custom Menu'));
        $resultPage->addBreadcrumb(__('Manage Link'), __('Manage Links'));
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Menu'));

        return $resultPage;
    }
}
