<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace OsmanSorkar\WidgetSampleData\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \OsmanSorkar\WidgetSampleData\Model\CmsBlock
     */
    protected $cmsBlock;

    /**
     * @param \OsmanSorkar\WidgetSampleData\Model\CmsBlock $cmsBlock
     */
    public function __construct(\OsmanSorkar\WidgetSampleData\Model\CmsBlock $cmsBlock) {
        $this->cmsBlock = $cmsBlock;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->cmsBlock->install(
            [
                'OsmanSorkar_WidgetSampleData::fixtures/cmsblock.csv'
            ]
        );
    }
}