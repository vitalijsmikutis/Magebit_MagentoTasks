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

namespace Magebit\ProductAttributes\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Registry;
use Magento\Catalog\Model\Product;
use Magento\Framework\Phrase;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute;

/**
 * Attributes Block
 *
 * Block responsible for fetching and displaying product attributes
 * for the current product on the product detail page.
 */
class Attributes extends Template
{
    /**
     * Predefined attribute list to prioritize.
     */
    private const ATTRIBUTES_TO_SHOW = [
        'colour' => 'Colour',
        'dimensions' => 'Dimensions',
        'material' => 'Material'
    ];

    /**
     * Constructor.
     *
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        private readonly Context $context,
        private readonly ProductRepositoryInterface $productRepository,
        private readonly Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get the current product from the registry.
     *
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->registry->registry('current_product');
    }

    /**
     * Fetch additional data for the product.
     *
     * @param array $excludeAttr
     * @return array
     */
    public function getAdditionalData(array $excludeAttr = []): array
    {
        $data = [];
        $product = $this->getProduct();

        if (!$product) {
            return $data;
        }

        $attributes = $product->getAttributes();

        $defaultAttributes = [];
        $additionalAttributes = [];

        foreach ($attributes as $attribute) {
            if ($this->isVisibleOnFrontend($attribute, $excludeAttr)) {
                $value = $attribute->getFrontend()->getValue($product);

                if ($value instanceof Phrase) {
                    $value = (string)$value;
                } elseif ($attribute->getFrontendInput() === 'price' && is_string($value)) {
                    $value = $this->priceCurrency->convertAndFormat($value);
                }

                if (is_string($value) && strlen(trim($value))) {
                    $attributeCode = $attribute->getAttributeCode();
                    $attributeData = [
                        'label' => $attribute->getStoreLabel(),
                        'value' => $value,
                        'code'  => $attributeCode,
                    ];

                    if (array_key_exists($attributeCode, self::ATTRIBUTES_TO_SHOW)) {
                        $defaultAttributes[$attributeCode] = $attributeData;
                    } else {
                        $additionalAttributes[$attributeCode] = $attributeData;
                    }
                }
            }
        }

        $result = [];
        foreach (self::ATTRIBUTES_TO_SHOW as $code => $label) {
            if (isset($defaultAttributes[$code])) {
                $result[$code] = $defaultAttributes[$code];
            }
        }

        if (count($result) < 3) {
            foreach ($additionalAttributes as $code => $attribute) {
                if (!isset($result[$code])) {
                    $result[$code] = $attribute;
                }
                if (count($result) >= 3) {
                    break;
                }
            }
        }

        return $result;
    }

    /**
     * Determine if the attribute should be displayed on the front-end.
     *
     * @param AbstractAttribute $attribute
     * @param array $excludeAttr
     * @return bool
     */
    protected function isVisibleOnFrontend(AbstractAttribute $attribute, array $excludeAttr): bool
    {
        return ($attribute->getIsVisibleOnFront() && !in_array($attribute->getAttributeCode(), $excludeAttr, true));
    }
}
