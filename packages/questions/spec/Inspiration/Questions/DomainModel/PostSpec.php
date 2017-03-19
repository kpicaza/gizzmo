<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\Post;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostSpec extends ObjectBehavior
{
    const TITLE = 'Post title';

    function it_should_have_a_title()
    {
        $this->beConstructedWith(
            self::TITLE
        );

        $this->title()->shouldBe(self::TITLE);
    }
}
