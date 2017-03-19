<?php

namespace spec\Inspiration\Quotes\Infrastructure\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class GuzzleQuoteClientSpec extends ObjectBehavior
{
    private $prophet;
    private $client;

    function let()
    {
        $this->prophet = new Prophet();
        $this->client = $this->prophet->prophesize(ClientInterface::class);
    }

    function it_should_request_for_a_quote()
    {
        $request = new QuoteRequest([]);

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
