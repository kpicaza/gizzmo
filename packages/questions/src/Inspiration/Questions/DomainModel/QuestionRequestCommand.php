<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Class QuestionRequestCommand
 */
class QuestionRequestCommand
{
    /**
     * @var string
     */
    private $question;

    /**
     * QuestionRequestCommand constructor.
     *
     * @param string $question
     */
    public function __construct(string $question)
    {
        $this->question = $question;
    }

    /**
     * @return string
     */
    public function question(): string
    {
        return $this->question;
    }
}
