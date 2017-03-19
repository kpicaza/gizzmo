<?php

namespace spec\Inspiration\Quotes\Infrastructure\Forismatic;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use Inspiration\Quotes\DomainModel\QuoteResponseException;
use Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequest;
use Inspiration\Quotes\Infrastructure\Forismatic\QuoteResponder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class QuoteResponderSpec extends ObjectBehavior
{
    const TEXT = 'Some quote text';
    const AUTHOR = 'Annonimous';
    const LINK = 'http://link.com';

    function it_should_thrown_an_exception_with_empty_response()
    {
        $this->shouldThrow(QuoteResponseException::class)->during('getResponse', [new Response()]);
    }

    function it_should_thrown_an_exception_with_invalid_response()
    {
        $response = new Response();
        $response = $response->withStatus(400);

        $this->shouldThrow(QuoteResponseException::class)->during('getResponse', [$response]);
    }

    function it_should_transform_forismatic_response_into_md_quote()
    {
        $prophet = new Prophet();
        $response = $prophet->prophesize(Response::class);
        $response->getStatusCode()->willReturn(200);
        $response->getBody()->willReturn(
            json_encode([
                'quoteText' => self::TEXT,
                'quoteAuthor' => self::AUTHOR,
                'quoteLink' => self::LINK,
            ], true)
        );

        $body = $this->getResponse($response);

        $body['text']->shouldBe(self::TEXT);
        $body['author']->shouldBe(self::AUTHOR);
        $body['link']->shouldBe(self::LINK);
    }
}
