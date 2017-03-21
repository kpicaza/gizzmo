<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\AnswerRequestHandler;
use Inspiration\Questions\DomainModel\QuestionRequestCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionRequestHandlerSpec extends ObjectBehavior
{
    const QUESTION = 'How to revert last commit and remove it from history?';

    function it_should_handle_a_command()
    {
        $this->handle(
            new QuestionRequestCommand(self::QUESTION)
        );
    }
}
