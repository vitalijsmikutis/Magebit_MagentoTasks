<?php

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit ProductAttributes
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\AddToCart\Block;

use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Api\Data\ProductInterface;

class AddToCart extends AbstractProduct
{
    /**
     * Constructor.
     *
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     * @param array $data
     */
    public function __construct(
        private readonly Context $context,
        private readonly ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get product data by product ID.
     *
     * @param int $productId
     * @return ProductInterface
     */
    public function getProductData(int $productId): ProductInterface
    {
        return $this->productRepository->getById($productId);
    }
}
