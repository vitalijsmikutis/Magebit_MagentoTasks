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

use Magebit\Faq\Api\FaqRepositoryInterface;
use Magebit\Faq\Api\Data\FaqInterface;
use Magebit\Faq\Api\Data\FaqSearchResultsInterface;
use Magebit\Faq\Api\Data\FaqSearchResultsInterfaceFactory;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory as FaqCollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Class FaqRepository
 * This class implements the CRUD operations for the FAQ entity.
 *
 * @package Magebit\Faq\Model
 */
class FaqRepository implements FaqRepositoryInterface
{
    private FaqResource $resource;
    private FaqFactory $faqFactory;
    private FaqCollectionFactory $faqCollectionFactory;
    private FaqSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * FaqRepository constructor.
     *
     * @param FaqResource $resource
     * @param FaqFactory $faqFactory
     * @param FaqCollectionFactory $faqCollectionFactory
     * @param FaqSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        FaqResource $resource,
        FaqFactory $faqFactory,
        FaqCollectionFactory $faqCollectionFactory,
        FaqSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->faqFactory = $faqFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Get FAQ by its ID.
     *
     * @param int $faqId
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function get(int $faqId): FaqInterface
    {
        $faq = $this->faqFactory->create();
        $this->resource->load($faq, $faqId);
        if (!$faq->getId()) {
            throw new NoSuchEntityException(__('FAQ with id "%1" does not exist.', $faqId));
        }
        return $faq;
    }

    /**
     * Save FAQ.
     *
     * @param FaqInterface $faq
     * @return FaqInterface
     * @throws CouldNotSaveException
     */
    public function save(FaqInterface $faq): FaqInterface
    {
        try {
            $this->resource->save($faq);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $faq;
    }

    /**
     * Retrieve a list of FAQs matching the provided search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return FaqSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): FaqSearchResultsInterface
    {
        $collection = $this->faqCollectionFactory->create();

        // Apply filters, sort orders, and pagination
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        // Sorting
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $collection->setOrder(
                $sortOrder->getField(),
                ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
            );
        }

        // Pagination
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());

        // Set search results
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete FAQ by entity.
     *
     * @param FaqInterface $faq
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(FaqInterface $faq): bool
    {
        try {
            $this->resource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete FAQ by its ID.
     *
     * @param int $faqId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $faqId): bool
    {
        $faq = $this->get($faqId);
        return $this->delete($faq);
    }
}
