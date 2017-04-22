<?php

namespace Inspiration\Questions\DomainModel;

use Kpicaza\Objects\Command;

/**
 * Class QuestionRequestCommand
 */
class QuestionRequestCommand implements Command
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
