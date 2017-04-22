<?php

namespace spec\Inspiration\Questions\Infrastructure\StackOverflow;

use Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionRequestFactorySpec extends ObjectBehavior
{
    const ORDER = 'desc';
    const SORT = 'relevance';
    const Q = 'some question made';
    const SITE = 'stackoverflow';
    const QUERY_PARAMS = [
        'order' => self::ORDER,
        'sort' => self::SORT,
        'q' => self::Q,
        'site' => self::SITE
    ];


    function it_should_create_question_request_objects()
    {
        $this->build(self::QUERY_PARAMS)->shouldBeAnInstanceOf(
            \Inspiration\Questions\DomainModel\QuestionRequest::class
        );
    }
}
