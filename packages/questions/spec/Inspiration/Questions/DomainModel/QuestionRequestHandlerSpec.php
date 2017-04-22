<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\QuestionRequestHandler;
use Inspiration\Questions\DomainModel\QuestionClient;
use Inspiration\Questions\DomainModel\QuestionRequestCommand;
use Inspiration\Questions\DomainModel\QuestionRequestFactory;
use Inspiration\Questions\Infrastructure\StackOverflow\QuestionRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class QuestionRequestHandlerSpec extends ObjectBehavior
{
    const QUESTION = 'How to revert last commit and remove it from history?';
    const ORDER = 'desc';
    const SORT = 'relevance';
    const SITE = 'stackoverflow';
    const QUERY_PARAMS = [
        'order' => self::ORDER,
        'sort' => self::SORT,
        'q' => self::QUESTION,
        'site' => self::SITE
    ];

    function it_should_handle_a_command(QuestionClient $client, QuestionRequestFactory $factory)
    {
        $factory->build(self::QUERY_PARAMS)->willReturn(
            new QuestionRequest(self::QUERY_PARAMS)
        );

        $this->beConstructedWith(
            $client,
            $factory
        );

        $this->handle(
            new QuestionRequestCommand(self::QUESTION)
        );
    }
}
