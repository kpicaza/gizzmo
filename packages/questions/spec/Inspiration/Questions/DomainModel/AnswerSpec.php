<?php

namespace spec\Inspiration\Questions\DomainModel;

use Inspiration\Questions\DomainModel\Answer;
use Inspiration\Questions\DomainModel\Messages;
use Inspiration\Questions\DomainModel\Post;
use Kpicaza\Objects\ExternalLink;
use Kpicaza\Objects\Title;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnswerSpec extends ObjectBehavior
{
    const TEXT = Messages::HAD_ANSWERS[0];
    const OTHER_TEXT = Messages::HAVENT_ANSWERS[0];
    const TITLE = 'Git revert last commit and remove it from history';
    const LINK = 'http://stackoverflow.com/questions/8903953/git-revert-last-commit-and-remove-it-from-history';
    const POINTS = 24;

    function it_should_have_a_text_answer()
    {
        $posts = [
            new Post(new Title(self::TITLE), new ExternalLink(self::LINK), self::POINTS)
        ];

        $this->beConstructedWith(
            $posts
        );

        $this->text()->shouldBe(self::TEXT);
        $this->posts()->shouldBe($posts);
    }

    function it_can_have_posts()
    {
        $this->text(self::OTHER_TEXT);
        $this->posts()->shouldBe([]);
    }
}
