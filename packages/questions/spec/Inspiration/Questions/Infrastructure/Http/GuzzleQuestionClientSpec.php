<?php

namespace spec\Inspiration\Questions\Infrastructure\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Inspiration\Questions\Infrastructure\Http\GuzzleQuestionClient;
use Inspiration\Questions\Infrastructure\StackOverflow\QuestionRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class GuzzleQuestionClientSpec extends ObjectBehavior
{
    private $prophet;
    private $client;

    function let()
    {
        $this->prophet = new Prophet();
        $this->client = $this->prophet->prophesize(ClientInterface::class);
    }

    function it_should_request_for_a_question()
    {
        $request = new QuestionRequest([]);

        $this->client->request('GET', '', [
            'query' => $request->getQuery()
        ])->willReturn(
            new Response()
        );

        $this->beConstructedWith(
            $this->client->reveal()
        );

        $this->get($request)->shouldBeAnInstanceOf(
            Response::class
        );
    }
}
