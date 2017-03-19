<?php

namespace spec\Inspiration\Quotes\DomainModel;

use Inspiration\Quotes\DomainModel\Quote;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuoteSpec extends ObjectBehavior
{
    const TEXT = 'A fancy quote.';
    const AUTHOR = 'Annonimous';
    const LINK = 'Some link';

    function it_must_have_text()
    {
        $this->beConstructedWith(
            self::TEXT,
            self::AUTHOR
        );

        $this->text()->shouldBe(self::TEXT);
    }

    function it_must_have_author()
    {
        $this->beConstructedWith(
            self::TEXT,
            self::AUTHOR
        );

        $this->author()->shouldBe(self::AUTHOR);
    }

    function it_can_have_link()
    {
        $this->beConstructedWith(
            self::TEXT,
            self::AUTHOR,
            self::LINK
        );

        $this->link()->shouldBe(self::LINK);
    }
}
