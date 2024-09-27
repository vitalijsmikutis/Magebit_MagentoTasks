<?php

declare(strict_types=1);

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\FaqInterface;
use Magebit\Faq\Api\FaqRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory as FaqCollectionFactory;

class FaqRepository implements FaqRepositoryInterface
{
    private FaqResource $faqResource;
    private FaqCollectionFactory $faqCollectionFactory;

    public function __construct(FaqResource $faqResource, FaqCollectionFactory $faqCollectionFactory)
    {
        $this->faqResource = $faqResource;
        $this->faqCollectionFactory = $faqCollectionFactory;
    }

    /**
     * Get FAQ by ID
     *
     * @param int $faqId
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function get(int $faqId): FaqInterface
    {
        // Logic to load FAQ by ID
    }

    /**
     * Save FAQ
     *
     * @param FaqInterface $faq
     * @return FaqInterface
     */
    public function save(FaqInterface $faq): FaqInterface
    {
        // Logic to save FAQ
    }

    /**
     * Delete FAQ by ID
     *
     * @param int $faqId
     * @return void
     * @throws NoSuchEntityException
     */
    public function delete(int $faqId): void
    {
        // Logic to delete FAQ by ID
    }

    /**
     * Delete FAQ
     *
     * @param FaqInterface $faq
     * @return void
     */
    public function deleteById(FaqInterface $faq): void
    {
        // Logic to delete FAQ entity
    }

    /**
     * Get list of FAQs
     *
     * @return FaqInterface[]
     */
    public function getList(): array
    {
        // Logic to get the list of FAQs
    }
}
