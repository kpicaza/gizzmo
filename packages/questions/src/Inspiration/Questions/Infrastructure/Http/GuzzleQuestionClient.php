<?php

namespace Inspiration\Questions\Infrastructure\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Inspiration\Questions\DomainModel\QuestionClient;
use Inspiration\Questions\DomainModel\QuestionRequest;

/**
 * Class GuzzleQuoteClient
 */
class GuzzleQuestionClient implements QuestionClient
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
     * @param QuestionRequest $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(QuestionRequest $request): Response
    {
        return $this->client->request('GET', '', [
            'query' => $request->getQuery()
        ]);
    }
}
