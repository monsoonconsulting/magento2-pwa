<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details.
 */
declare(strict_types=1);

namespace Monsoon\Pwa\Model;

/**
 * Interface ConfigurationInterface
 */
interface ConfigurationInterface
{
    const SERVICE_WORKER_PATH = "service-worker.js";
    const XML_PATH_ENABLED = 'monsoon_pwa/general/enabled';
    const XML_PATH_OFFLINE_PAGE = 'monsoon_pwa/general/offline_page';
    const XML_PATH_GA_OFFLINE_ENABLED = 'monsoon_pwa/general/ga_offline_enable';
    const XML_PATH_UNREGISTER_SW = 'monsoon_pwa/general/unregister_sw';
    const XML_PATH_CACHE_LIFETIME = 'monsoon_pwa/caching/cache_lifetime';
    const XML_PATH_CACHE_STATIC_ASSETS = 'monsoon_pwa/caching/cache_static_assets';
    const XML_PATH_CACHE_MEDIA_ASSETS = 'monsoon_pwa/caching/cache_media_assets';
    const XML_PATH_CACHE_GOOGLE_FONTS = 'monsoon_pwa/caching/cache_google_fonts';
    const XML_PATH_SW_VERSION = 'monsoon_pwa/lifecycle/sw_version';
    const XML_PATH_ENABLE_SKIP_WAITING = 'monsoon_pwa/lifecycle/enable_skip_waiting';
    const XML_PATH_ENABLE_CLIENTS_CLAIM = 'monsoon_pwa/lifecycle/enable_clients_claim';

    /**
     * Get extension status
     *
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * Get offline page config
     *
     * @param int|string|null $store
     * @return string
     */
    public function getOfflinePage(int $store = null): string;

    /**
     * Check if GoogleAnalytics Offline is enabled
     *
     * @return bool
     */
    public function isGaOffLineEnabled(): bool;

    /**
     * Check if service worker is to be unregistered
     *
     * @return bool
     */
    public function isUnregisterSwEnabled(): bool;

    /**
     * Get cache lifetime config
     *
     * @param int|string|null $store
     * @return string
     */
    public function getCacheLifetime(int $store = null): string;

    /**
     * Check if Cache Static Assets is to be enabled
     *
     * @return bool
     */
    public function isCacheStaticAssetsEnabled(): bool;

    /**
     * Check if Cache Media Assets is to be enabled
     *
     * @return bool
     */
    public function isCacheMediaAssetsEnabled(): bool;

    /**
     * Check if Cache Google Fonts is to be enabled
     *
     * @return bool
     */
    public function isCacheGoogleFontsEnabled(): bool;

    /**
     * Get cache lifetime config
     *
     * @param int|string|null $store
     * @return string
     */
    public function getSwVersion(int $store = null): string;

    /**
     * Check if Skip waiting is to be enabled
     *
     * @return bool
     */
    public function isSkipWaitingEnabled(): bool;

    /**
     * Check if clients.claim is to be enabled
     *
     * @return bool
     */
    public function isClientsClaimEnabled(): bool;
}
