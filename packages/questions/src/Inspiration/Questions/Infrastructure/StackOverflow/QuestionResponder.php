<?php

namespace Inspiration\Questions\Infrastructure\StackOverflow;

use Inspiration\Questions\DomainModel\QuestionResponseException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class QuestionResponder
 */
class QuestionResponder
{
    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    public function getResponse(ResponseInterface $response)
    {
        if (200 !== $response->getStatusCode()) {
            throw new QuestionResponseException(
                'Http Request failed.'
            );
        }

        $body = json_decode((string)$response->getBody(), true);

        if (
            null === $body
        ) {
            throw new QuestionResponseException(
                'Invalid response.'
            );
        }

        return [
        ];

    }
}
