<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Monsoon\Pwa\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RouterInterface;

use Monsoon\Pwa\Model\ConfigurationInterface;

/**
 * Class Router routes /service-worker.js to correct controller
 */
class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * @var ConfigurationInterface
     */
    private $config;

    /**
     * Router constructor.
     * @param ActionFactory $actionFactory
     * @param ConfigurationInterface $config
     */
    public function __construct(
        ActionFactory $actionFactory,
        ConfigurationInterface $config
    ) {
        $this->actionFactory = $actionFactory;
        $this->config = $config;
    }

    /**
     * @inheritdoc
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $requestPath = trim($request->getPathInfo(), "/");

        if ($requestPath === $this->config::SERVICE_WORKER_PATH && $this->config->isEnabled()) {
            $request
                ->setModuleName("serviceworker")
                ->setControllerName("index")
                ->setActionName("js");

            return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }

        return null;
    }
}
