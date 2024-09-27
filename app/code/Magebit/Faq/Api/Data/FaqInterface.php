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


namespace Magebit\Faq\Api\Data;

interface FaqInterface
{
    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';

    /**
     * Get ID
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Get Question
     * @return string|null
     */
    public function getQuestion(): ?string;

    /**
     * Set Question
     * @param string $question
     * @return $this
     */
    public function setQuestion(string $question): self;

    /**
     * Get Answer
     * @return string|null
     */
    public function getAnswer(): ?string;

    /**
     * Set Answer
     * @param string $answer
     * @return $this
     */
    public function setAnswer(string $answer): self;

    /**
     * Get Status
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Set Status
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self;

    /**
     * Get Position
     * @return int|null
     */
    public function getPosition(): ?int;

    /**
     * Set Position
     * @param int $position
     * @return $this
     */
    public function setPosition(int $position): self;

    /**
     * Get Updated At
     * @return string|null
     */
    public function getUpdatedAt(): ?string;
}
