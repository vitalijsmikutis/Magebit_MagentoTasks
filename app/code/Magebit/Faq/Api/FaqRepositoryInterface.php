<?php

declare(strict_types=1);

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\FaqInterface;

/**
 * Interface for FAQ Repository
 *
 * @package Magebit\Faq\Api
 */
interface FaqRepositoryInterface
{
    /**
     * Get FAQ by ID
     *
     * @param int $faqId
     * @return FaqInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $faqId): FaqInterface;

    /**
     * Save FAQ
     *
     * @param FaqInterface $faq
     * @return FaqInterface
     */
    public function save(FaqInterface $faq): FaqInterface;

    /**
     * Delete FAQ by ID
     *
     * @param int $faqId
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete(int $faqId): void;

    /**
     * Delete FAQ
     *
     * @param FaqInterface $faq
     * @return void
     */
    public function deleteById(FaqInterface $faq): void;

    /**
     * Get list of FAQs
     *
     * @return FaqInterface[]
     */
    public function getList(): array;
}
