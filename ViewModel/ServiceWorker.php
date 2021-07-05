<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Monsoon\Pwa\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Cms\Helper\Page;

use Monsoon\Pwa\Model\ConfigurationInterface;

/**
 * Class ServiceWorker ViewModel to pass data to template
 */
class ServiceWorker implements ArgumentInterface
{
    /**
     * @var ConfigurationInterface
     */
    private $config;

    /**
     * @var Page
     */
    private $cmsPageHelper;

    /**
     * ServiceWorker constructor.
     * @param ConfigurationInterface $config
     * @param Page $cmsPageHelper
     */
    public function __construct(
        ConfigurationInterface $config,
        Page $cmsPageHelper
    ) {
        $this->config = $config;
        $this->cmsPageHelper    = $cmsPageHelper;
    }

    /**
     * Get Service Worker path
     *
     * @return string
     */
    public function getServiceWorkerPath(): string
    {
        return (string)$this->config::SERVICE_WORKER_PATH;
    }

    /**
     * Get offline page URL
     *
     * @return string
     */
    public function getOfflinePageUrl(): string
    {
        $identifier = $this->config->getOfflinePage();

        return (string)$this->cmsPageHelper->getPageUrl($identifier);
    }

    /**
     * Is service worker enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled();
    }

    /**
     * Is service worker enabled
     *
     * @return bool
     */
    public function isGaOfflineEnabled(): bool
    {
        return $this->config->isGaOffLineEnabled();
    }

    /**
     * Is service worker enabled
     *
     * @return bool
     */
    public function isUnregisterAllowed(): bool
    {
        return $this->config->isUnregisterSwEnabled() && !$this->config->isEnabled();
    }

    /**
     * Get cache lifetime
     *
     * @return string
     */
    public function getCacheLifetime(): string
    {
        return (string)$this->config->getCacheLifetime();
    }

    /**
     * Checks that Static Caching is enabled
     *
     * @return bool
     */
    public function isCacheStaticAssetsEnabled(): bool
    {
        return $this->config->isCacheStaticAssetsEnabled();
    }

    /**
     * Checks that Media Caching is enabled
     *
     * @return bool
     */
    public function isCacheMediaAssetsEnabled(): bool
    {
        return $this->config->isCacheMediaAssetsEnabled();
    }

    /**
     * Checks that Google Font Caching is enabled
     *
     * @return bool
     */
    public function isCacheGoogleFontsEnabled(): bool
    {
        return $this->config->isCacheGoogleFontsEnabled();
    }

    /**
     * Get service worker version
     *
     * @return string
     */
    public function getSwVersion(): string
    {
        return (string)$this->config->getSwVersion();
    }

    /**
     * Checks that skip waiting is enabled
     *
     * @return bool
     */
    public function isSkipWaitingEnabled(): bool
    {
        return $this->config->isSkipWaitingEnabled();
    }

    /**
     * Checks that clients.claim is enabled
     *
     * @return bool
     */
    public function isClientsClaimEnabled(): bool
    {
        return $this->config->isClientsClaimEnabled();
    }
}
