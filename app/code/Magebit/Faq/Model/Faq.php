<?php

declare(strict_types=1);


namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Model\AbstractModel;
use Magebit\Faq\Model\ResourceModel\Faq as FaqResource;

class Faq extends AbstractModel implements FaqInterface
{
    protected function _construct()
    {
        $this->_init(FaqResource::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    public function setPosition($position)
    {
        return $this->setData(self::POSITION, value: $position);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
}
