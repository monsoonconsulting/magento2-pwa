<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details.
 */
declare(strict_types=1);

namespace Monsoon\Pwa\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\LayoutFactory;

/**
 * Class Js for service worker
 */
class Js extends Action
{

    /**
     * @var LayoutFactory
     */
    protected $layoutFactory;

    /**
     * Constructor
     * @param LayoutFactory $layoutFactory
     * @param Context $context
     */
    public function __construct(
        LayoutFactory $layoutFactory,
        Context $context
    ) {
        $this->layoutFactory = $layoutFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->layoutFactory->create()
            ->addDefaultHandle()
            ->setHeader("Content-Type", "text/javascript", true);
    }
}
