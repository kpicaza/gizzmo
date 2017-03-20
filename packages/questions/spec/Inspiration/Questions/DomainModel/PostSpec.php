<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\Post;
use Kpicaza\Objects\ExternalLink;
use Kpicaza\Objects\Title;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostSpec extends ObjectBehavior
{
    const TITLE = 'Git revert last commit and remove it from history';
    const LINK = 'http://stackoverflow.com/questions/8903953/git-revert-last-commit-and-remove-it-from-history';
    const POINTS = 24;

    function it_should_have_a_title()
    {
        $this->beConstructedWith(
            new Title(self::TITLE),
            new ExternalLink(self::LINK),
            self::POINTS
        );

        $this->title()->shouldBe(self::TITLE);
    }

    function it_should_have_a_link()
    {
        $this->beConstructedWith(
            new Title(self::TITLE),
            new ExternalLink(self::LINK),
            self::POINTS
        );

        $this->link()->shouldBe(self::LINK);
    }

    function it_should_have_points()
    {
        $this->beConstructedWith(
            new Title(self::TITLE),
            new ExternalLink(self::LINK),
            self::POINTS
        );

        $this->points()->shouldBe(self::POINTS);
    }
}
