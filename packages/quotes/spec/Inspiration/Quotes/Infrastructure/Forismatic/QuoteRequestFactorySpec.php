<?php

namespace spec\Inspiration\Quotes\Infrastructure\Forismatic;

use Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequest;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuoteRequestFactorySpec extends ObjectBehavior
{
    function it_should_create_quote_request_objects()
    {
        $this->beConstructedWith(
            QuoteRequest::QUERY_PARAMS
        );

        $this->getRequest()->shouldBeAnInstanceOf(
            \Inspiration\Quotes\DomainModel\QuoteRequest::class
        );
    }
}
