<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace OsmanSorkar\CmsSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \OsmanSorkar\CmsSampleData\Model\Page
     */
    private $page;

    /**
     * @var \OsmanSorkar\CmsSampleData\Model\Block
     */
    private $block;

    /**
     * @param \Magento\CatalogSampleData\Model\Category $category
     * @param \Magento\ThemeSampleData\Model\Css $css
     * @param \OsmanSorkar\CmsSampleData\Model\Page $page
     * @param \OsmanSorkar\CmsSampleData\Model\Block $block
     */
    public function __construct(
        \OsmanSorkar\CmsSampleData\Model\Page $page,
        \OsmanSorkar\CmsSampleData\Model\Block $block
    ) {
        $this->page = $page;
        $this->block = $block;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->page->install(['Magento_CmsSampleData::fixtures/pages/pages.csv']);
        $this->block->install(
            [
                'OsmanSorkar_CmsSampleData::fixtures/blocks/categories_static_blocks.csv',
            ]
        );
    }
}