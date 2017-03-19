<?php

namespace spec\Inspiration\Quotes\Infrastructure\Forismatic;

use GuzzleHttp\Psr7\Response;
use Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequest;
use Inspiration\Quotes\Infrastructure\Forismatic\QuoteResponder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuoteResponderSpec extends ObjectBehavior
{
    const TEXT = 'Some quote text';
    const AUTHOR = 'Annonimous';
    const LINK = 'http://link.com';

    function it_should_transform_forismatic_response_into_md_quote()
    {
        $response = $this->getResponse(
            new Response()
        );

        $response['text']->shouldBe(self::TEXT);
        $response['author']->shouldBe(self::AUTHOR);
        $response['link']->shouldBe(self::LINK);
    }
}
