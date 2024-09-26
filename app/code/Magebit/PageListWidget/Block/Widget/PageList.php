<?php

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * PageList Widget Block
 *
 * Block responsible for fetching and displaying CMS pages based on the widget's configuration.
 */
class PageList extends Template implements BlockInterface
{
    /**
     * Path to the default template for rendering the widget.
     *
     * @var string
     */
    protected $_template = 'Magebit_PageListWidget::page-list.phtml';

    /**
     * Page repository interface to retrieve CMS pages.
     *
     * @var PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * Search criteria builder to define search filters for pages.
     *
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param PageRepositoryInterface $pageRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        Template\Context $context,
        PageRepositoryInterface $pageRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->pageRepository = $pageRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    /**
     * Get CMS pages based on the widget configuration.
     *
     * If the display mode is set to 'all_pages', this method will return all CMS pages.
     * If the display mode is 'specific_page', only the selected pages will be retrieved.
     *
     * @return \Magento\Cms\Api\Data\PageInterface[] Array of page entities.
     */
    public function getSelectedPages()
    {
        $selectedPages = $this->getData('selected_page');

        if (!$selectedPages) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            return $this->pageRepository->getList($searchCriteria)->getItems();
        }

        $pageIdentifiers = explode(',', $selectedPages);
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('identifier', $pageIdentifiers, 'in')
            ->create();

        return $this->pageRepository->getList($searchCriteria)->getItems();
    }
}
