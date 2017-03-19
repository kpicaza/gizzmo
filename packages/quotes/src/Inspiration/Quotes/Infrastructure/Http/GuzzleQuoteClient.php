<?php

namespace Inspiration\Quotes\Infrastructure\Http;

use GuzzleHttp\ClientInterface;
use Inspiration\Quotes\DomainModel\QuoteClient;
use Inspiration\Quotes\DomainModel\QuoteRequest;

/**
 * Class GuzzleQuoteClient
 */
class GuzzleQuoteClient implements QuoteClient
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * GuzzleQuoteClient constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param QuoteRequest $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(QuoteRequest $request)
    {
        return $this->client->request('GET', '', [
            'query' => $request->getQuery()
        ]);
    }
}
