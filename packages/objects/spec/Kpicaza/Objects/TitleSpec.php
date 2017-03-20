<?php

namespace spec\Kpicaza\Objects;

use Kpicaza\Objects\InvalidArgumentException;
use Kpicaza\Objects\Title;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TitleSpec extends ObjectBehavior
{
    const SHORT_TITLE = 'too short';
    const LARGE_TITLE = 'too large title, too large title, too large title, too large 
    title, too large title, too large title, too large title, too large title, 
    title, too large title, too large title, too large title, too large title, 
    title, too large title, too large title, too large title, too large title, 
    ';
    const TITLE = 'This is a valid post title.';

    function it_should_be_longer_than_20_charactters_or_thrown_an_exception()
    {
        $this->beConstructedWith(
            self::SHORT_TITLE
        );

        $this->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation();
    }

    function it_should_be_shorter_than_160_charactters_or_thrown_an_exception()
    {
        $this->beConstructedWith(
            self::LARGE_TITLE
        );

        $this->shouldThrow(InvalidArgumentException::class)
            ->duringInstantiation();
    }

    function it_should_have_a_title_text()
    {
        $this->beConstructedWith(
            self::TITLE
        );

        $this->text()->shouldBe(self::TITLE);
    }

    function it_should_be_created_throug_a_string()
    {
        $this->beConstructedThrough('fromString', [self::TITLE]);

        $this->text()->shouldBe(self::TITLE);
    }
}
