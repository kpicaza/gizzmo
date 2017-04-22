<?php

namespace spec\Inspiration\Questions\Infrastructure\StackOverflow;

use GuzzleHttp\Psr7\Response;
use Inspiration\Questions\DomainModel\QuestionResponseException;
use Inspiration\Questions\Infrastructure\StackOverflow\QuestionResponder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class QuestionResponderSpec extends ObjectBehavior
{
    const JSON_RESPONSE = '{
    "items": [
    {
      "tags": [
        "git"
      ],
      "owner": {
        "reputation": 6993,
        "user_id": 98151,
        "user_type": "registered",
        "accept_rate": 60,
        "profile_image": "https://www.gravatar.com/avatar/e83b38029ee4962c56737a9b977905b3?s=128&d=identicon&r=PG",
        "display_name": "daniel",
        "link": "http://stackoverflow.com/users/98151/daniel"
      },
      "is_answered": true,
      "view_count": 32865,
      "accepted_answer_id": 8904080,
      "answer_count": 4,
      "score": 30,
      "last_activity_date": 1453478877,
      "creation_date": 1326849270,
      "question_id": 8903953,
      "link": "http://stackoverflow.com/questions/8903953/git-revert-last-commit-and-remove-it-from-history",
      "title": "Git revert last commit and remove it from history"
        }
      ]
    }';
    const TEXT = 'Some quote text';
    const AUTHOR = 'Annonimous';
    const LINK = 'http://link.com';

    function it_should_thrown_an_exception_with_empty_response()
    {
        $this->shouldThrow(QuestionResponseException::class)->during('getResponse', [new Response()]);
    }

    function it_should_thrown_an_exception_with_invalid_response()
    {
        $response = new Response();
        $response = $response->withStatus(400);

        $this->shouldThrow(QuestionResponseException::class)->during('getResponse', [$response]);
    }

    function it_should_transform_forismatic_response_into_md_quote()
    {
        $prophet = new Prophet();
        $response = $prophet->prophesize(Response::class);
        $response->getStatusCode()->willReturn(200);
        $response->getBody()->willReturn(
            self::JSON_RESPONSE
        );

        $body = $this->getResponse($response);
    }
}
