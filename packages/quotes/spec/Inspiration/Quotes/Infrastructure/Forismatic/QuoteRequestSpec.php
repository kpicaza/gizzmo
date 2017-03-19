<?php

namespace spec\Inspiration\Quotes\Infrastructure\Forismatic;

use Inspiration\Quotes\DomainModel\QuoteRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuoteRequestSpec extends ObjectBehavior
{
    const FORMAT = 'json';
    const LANG = 'en';
    const METHOD = 'getQuote';
    const KEY = '999999';
    const QUERY_PARAMS = [
        'method' => self::METHOD,
        'format' => self::FORMAT,
        'lang' => self::LANG,
        'key' => self::KEY
    ];

    function it_should_have_request_query_params()
    {
        $this->beConstructedWith(
            self::QUERY_PARAMS
        );

        $this->shouldBeAnInstanceOf(
            QuoteRequest::class
        );

        $response = $this->getQuery();
        $response['method']->shouldBe(self::METHOD);
        $response['format']->shouldBe(self::FORMAT);
        $response['lang']->shouldBe(self::LANG);
    }
}
