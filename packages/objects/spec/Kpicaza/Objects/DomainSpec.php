<?php

namespace spec\Kpicaza\Objects;

use Kpicaza\Objects\Domain;
use Kpicaza\Objects\InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DomainSpec extends ObjectBehavior
{
    const DOMAIN_NAME = 'google.com';
    const OTHER_DOMAIN_NAME = 'www.hiruweb.net';
    const DOMAIN_WITH_PROTOCOL = '.google.com';

    function it_should_have_a_valid_domain_estructure_or_thrown_an_exception()
    {
        $this->beConstructedWith(
            self::DOMAIN_WITH_PROTOCOL
        );

        $this->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation();
    }

    function it_should_have_domain_name()
    {
        $this->beConstructedWith(
            self::DOMAIN_NAME
        );

        $this->fqdn()->shouldBe(self::DOMAIN_NAME);
    }

    function it_should_be_created_throug_a_string()
    {
        $this->beConstructedThrough('fromString', [self::OTHER_DOMAIN_NAME]);

        $this->fqdn()->shouldBe(self::OTHER_DOMAIN_NAME);
    }

}
