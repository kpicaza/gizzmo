<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\AnswerRequestCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionRequestCommandSpec extends ObjectBehavior
{
    const QUESTION = 'How to revert last commit and remove it from history?';

    function it_should_have_a_question()
    {
        $this->beConstructedWith(
            self::QUESTION
        );

        $this->question()->shouldBe(self::QUESTION);
    }
}
