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

/**
 * Interface FaqManagementInterface
 *
 * @package Magebit\Faq\Api\Data
 */
interface FaqManagementInterface
{
    /**
     * Enable the FAQ question
     *
     * @param int $faqId
     * @return void
     */
    public function enableQuestion(int $faqId): void;

    /**
     * Disable the FAQ question
     *
     * @param int $faqId
     * @return void
     */
    public function disableQuestion(int $faqId): void;
}
