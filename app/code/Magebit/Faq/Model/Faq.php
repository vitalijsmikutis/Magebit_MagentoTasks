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

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;

/**
 * Class Faq
 * @package Magebit\Faq\Model
 */
class Faq extends AbstractModel implements FaqInterface
{
    /**
     * Initialize resource model
     */
    protected function _construct(): void
    {
        $this->_init(FaqResource::class);
    }

    /**
     * Get FAQ ID
     * @return int|null
     */
    public function getId(): ?int
    {
        return (int) $this->getData(self::ID);
    }

    /**
     * Get FAQ question
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Set FAQ question
     * @param string $question
     * @return $this
     */
    public function setQuestion(string $question): FaqInterface
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Get FAQ answer
     * @return string|null
     */
    public function getAnswer(): ?string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set FAQ answer
     * @param string $answer
     * @return $this
     */
    public function setAnswer(string $answer): FaqInterface
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Get FAQ status
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return (int) $this->getData(self::STATUS);
    }

    /**
     * Set FAQ status
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): FaqInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get FAQ position
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return (int) $this->getData(self::POSITION);
    }

    /**
     * Set FAQ position
     * @param int $position
     * @return $this
     */
    public function setPosition(int $position): FaqInterface
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * Get last updated time
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }
}
