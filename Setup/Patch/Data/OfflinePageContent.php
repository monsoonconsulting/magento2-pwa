<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details
 */

declare(strict_types=1);

namespace Monsoon\Pwa\Setup\Patch\Data;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class OfflinePageContent patch to create/update offline CMS page
 */
class OfflinePageContent implements DataPatchInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * UpdateHomePage constructor.
     * @param PageFactory $pageFactory
     */
    public function __construct(
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
        $cmsPages = [
            [
                'title' => 'Offline',
                'page_layout' => '1column',
                'identifier' => 'offline',
                'content_heading' => 'It seems that you are offline!',
                'content' => '<p>Please check your internet connection, and try again.</p>',
                'is_active' => '1',
                'stores' => [0],
                'sort_order' => 0,
            ]
        ];

        /**
         * Insert cms pages
         */
        foreach ($cmsPages as $data) {
            $cmsPage = $this->pageFactory->create()->load(
                $data['identifier'],
                'identifier'
            );
            if ($cmsPage->getId()) {
                $cmsPage->delete();
            }
            $cmsPage->addData($data)->save();
            $cmsPage->addData(['layout_update_selected' => 'Offline'])->save();
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
