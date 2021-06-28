<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details.
 */
declare(strict_types=1);

namespace Monsoon\Pwa\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

use Monsoon\Pwa\Model\ConfigurationInterface;

/**
 * Class Configuration for handling module configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritDoc
     */
    public function isEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function getOfflinePage(int $store = null): string
    {
        return (string)$this->scopeConfig->getValue(
            static::XML_PATH_OFFLINE_PAGE,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isGaOffLineEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_GA_OFFLINE_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isUnregisterSwEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_UNREGISTER_SW,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function getCacheLifetime(int $store = null): string
    {
        return (string)$this->scopeConfig->getValue(
            static::XML_PATH_CACHE_LIFETIME,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isCacheStaticAssetsEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CACHE_STATIC_ASSETS,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isCacheMediaAssetsEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CACHE_MEDIA_ASSETS,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isCacheGoogleFontsEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CACHE_GOOGLE_FONTS,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function getSwVersion(int $store = null): string
    {
        return (string)$this->scopeConfig->getValue(
            static::XML_PATH_SW_VERSION,
            ScopeInterface::SCOPE_STORES,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isSkipWaitingEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE_SKIP_WAITING,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    /**
     * @inheritDoc
     */
    public function isClientsClaimEnabled(int $store = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE_CLIENTS_CLAIM,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }
}
