<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jworks\CatalogSetup\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * Setup class for category
     *
     * @var \Jworks\CatalogSetup\Model\Category
     */
    protected $categorySetup;

    /**
     * Setup class for product attributes
     *
     * @var \Jworks\CatalogSetup\Model\Attribute
     */
    protected $attributeSetup;

    /**
     * Setup class for products
     *
     * @var \Jworks\CatalogSetup\Model\Product
     */
    protected $productSetup;


    public function __construct(
        \Jworks\CatalogSetup\Model\Category $categorySetup,
        \Jworks\CatalogSetup\Model\Attribute $attributeSetup,
        \Jworks\CatalogSetup\Model\Product $productSetup
    ) {
        $this->categorySetup = $categorySetup;
        $this->attributeSetup = $attributeSetup;
        $this->productSetup = $productSetup;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->attributeSetup->install(['Jworks_CatalogSetup::fixtures/attributes.csv']);
        $this->categorySetup->install(['Jworks_CatalogSetup::fixtures/categories.csv']);
        $this->productSetup->install(
            [
                'Jworks_CatalogSetup::fixtures/SimpleProduct/products_gear_watches.csv',
            ],
            [
                'Jworks_CatalogSetup::fixtures/SimpleProduct/images_gear_watches.csv',
            ]
        );
    }
}
