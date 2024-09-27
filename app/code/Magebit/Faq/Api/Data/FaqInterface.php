<?php

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
    public function getId();

    /**
     * Get Question
     * @return string
     */
    public function getQuestion();

    /**
     * Set Question
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Get Answer
     * @return string
     */
    public function getAnswer();

    /**
     * Set Answer
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Get Status
     * @return int
     */
    public function getStatus();

    /**
     * Set Status
     * @param int $status
     * @return $this
     */
    public function setStatus($status);

    /**
     * Get Position
     * @return int
     */
    public function getPosition();

    /**
     * Set Position
     * @param int $position
     * @return $this
     */
    public function setPosition($position);

    /**
     * Get Updated At
     * @return string|null
     */
    public function getUpdatedAt();
}
