<?php

namespace Inspiration\Quotes\Infrastructure\Forismatic;

use Inspiration\Quotes\DomainModel\QuoteResponder as BaseResponder;
use Inspiration\Quotes\DomainModel\QuoteResponseException;
use Psr\Http\Message\ResponseInterface;

class QuoteResponder implements BaseResponder
{
    public function getResponse(ResponseInterface $response)
    {
        if (200 !== $response->getStatusCode()) {
            throw new QuoteResponseException(
                'Http Request failed.'
            );
        }

        $body = json_decode((string)$response->getBody(), true);

        if (null === $body
            || false === array_key_exists('quoteText', $body)
            || true === empty($body['quoteText'])
        ) {
            throw new QuoteResponseException(
                'Invalid response.'
            );
        }

        return [
            'text' => $body['quoteText'],
            'author' => $body['quoteAuthor'],
            'link' => $body['quoteLink']
        ];
    }
}
