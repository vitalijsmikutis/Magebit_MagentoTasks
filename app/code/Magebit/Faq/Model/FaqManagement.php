<?php

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit FAQ
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\FaqManagementInterface;
use Magebit\Faq\Api\FaqRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class FaqManagement implements FaqManagementInterface
{
    private FaqRepositoryInterface $faqRepository;

    public function __construct(FaqRepositoryInterface $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    /**
     * Enable the FAQ question
     *
     * @param int $faqId
     * @return void
     * @throws NoSuchEntityException
     */
    public function enableQuestion(int $faqId): void
    {
        $faq = $this->faqRepository->get($faqId);
        if (!$faq) {
            throw new NoSuchEntityException(__('FAQ with id %1 does not exist.', $faqId));
        }

        $faq->setStatus(1);
        $this->faqRepository->save($faq);
    }

    /**
     * Disable the FAQ question
     *
     * @param int $faqId
     * @return void
     * @throws NoSuchEntityException
     */
    public function disableQuestion(int $faqId): void
    {
        $faq = $this->faqRepository->get($faqId);
        if (!$faq) {
            throw new NoSuchEntityException(__('FAQ with id %1 does not exist.', $faqId));
        }

        $faq->setStatus(0);
        $this->faqRepository->save($faq);
    }
}
