<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Jworks\CatalogSetup\Setup\Patch\Data;

use Magento\Framework\Setup;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

/**
 * Class InstallCatalogSampleData
 * @package Jworks\CatalogSetup\Setup\Patch\Data
 */
class InstallCatalogSampleData implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var \Jworks\CatalogSetup\Setup\Installer
     */
    protected $installer;

    /**
     * InstallCatalogSampleData constructor.
     * @param Setup\SampleData\Executor $executor
     * @param \Jworks\CatalogSetup\Setup\Installer $installer
     */
    public function __construct(
        Setup\SampleData\Executor $executor,
        \Jworks\CatalogSetup\Setup\Installer $installer
    ) {
        $this->executor = $executor;
        $this->installer = $installer;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->executor->exec($this->installer);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
