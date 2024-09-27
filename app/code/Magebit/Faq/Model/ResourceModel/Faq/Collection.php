<?php

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magebit\Faq\Model\Faq as FaqModel;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;

/**
 * Class Collection
 *
 * Collection class for Faq entity
 *
 * @package Magebit\Faq\Model\ResourceModel\Faq
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize the collection
     *
     * Defines the model and resource model used in this collection.
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(FaqModel::class, FaqResource::class);
    }
}
