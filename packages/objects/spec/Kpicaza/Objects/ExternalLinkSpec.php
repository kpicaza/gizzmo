<?php

namespace spec\Kpicaza\Objects;

use Kpicaza\Objects\ExternalLink;
use Kpicaza\Objects\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExternalLinkSpec extends ObjectBehavior
{
    const URL = 'https://google.com';
    const INVALID_URL = 'https:/googlecom';

    function it_should_start_by_http_s_or_thrown_an_exception()
    {
        $this->beConstructedWith(
            self::INVALID_URL
        );

        $this->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation();
    }

    function it_should_have_an_url()
    {
        $this->beConstructedWith(
            self::URL
        );

        $this->url()->shouldBe(self::URL);
    }

    function it_can_be_created_from_string()
    {
        $this->beConstructedThrough('fromString', [
            self::URL
        ]);

        $this->url()->shouldBe(self::URL);
    }
}
