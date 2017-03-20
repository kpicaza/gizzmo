<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\Answer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnswerSpec extends ObjectBehavior
{
    function it_can_have_posts()
    {
        $this->shouldHaveType(Answer::class);
    }
}
