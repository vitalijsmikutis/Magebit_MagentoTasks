<?php

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit_Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface FaqSearchResultsInterface
 *
 * @package Magebit\Faq\Api\Data
 */
interface FaqSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of FAQs
     *
     * @return FaqInterface[]
     */
    public function getItems(): array;

    /**
     * Set list of FAQs
     *
     * @param FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items): static;

    /**
     * Get total count of FAQs
     *
     * @return int
     */
    public function getTotalCount(): int;

    /**
     * Set total count of FAQs
     *
     * @param int $totalCount
     * @return static
     */
    public function setTotalCount($totalCount): static;
}
