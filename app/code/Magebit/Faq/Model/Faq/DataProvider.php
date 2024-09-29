<?php

declare(strict_types=1);

namespace Magebit\Faq\Model\Faq;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as UiDataProvider;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magebit\Faq\Api\FaqRepositoryInterface;
use Magebit\Faq\Api\Data\FaqSearchResultsInterface;

class DataProvider extends UiDataProvider
{
    private FaqRepositoryInterface $faqRepository;

    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        FaqRepositoryInterface $faqRepository,
        array $meta = [],
        array $data = []
    ) {
        $this->faqRepository = $faqRepository;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Retrieve data for the FAQ grid
     *
     * @return array
     */
    public function getData(): array
    {
        $searchCriteria = $this->getSearchCriteria();
        /** @var FaqSearchResultsInterface $searchResults */
        $searchResults = $this->faqRepository->getList($searchCriteria);

        return [
            'totalCount' => $searchResults->getTotalCount(),
            'items' => $searchResults->getItems(),
        ];
    }
}
