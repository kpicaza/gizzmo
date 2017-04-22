<?php

namespace spec\Inspiration\Questions\Infrastructure\StackOverflow;

use Inspiration\Questions\Infrastructure\StackOverflow\QuestionRequest;
use Inspiration\Questions\DomainModel\QuestionRequest as QuestionRequestInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionRequestSpec extends ObjectBehavior
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

    function it_should_have_request_query_params()
    {
        $this->beConstructedWith(
            self::QUERY_PARAMS
        );

        $this->shouldBeAnInstanceOf(
            QuestionRequestInterface::class
        );

        $response = $this->getQuery();
        $response['order']->shouldBe(self::ORDER);
        $response['sort']->shouldBe(self::SORT);
        $response['q']->shouldBe(self::Q);
        $response['site']->shouldBe(self::SITE);
    }
}
