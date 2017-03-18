<?php

namespace Kpicaza\Inspiration\Command;

use GuzzleHttp\ClientInterface;
use Kpicaza\Inspiration\Exception\RuntimeException;
use PhpSlackBot\Command\BaseCommand;

/**
 * Class QuestionCommand
 */
class QuestionCommand extends BaseCommand
{
    const NAME = '@question';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * QuoteClientFactory constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    protected function configure()
    {
        $this->setName(self::NAME);
    }

    protected function execute($message, $context)
    {
        $text = substr($message['text'], 0, strlen(self::NAME));

        $response = $this->client->request('GET', '', [
            'query' => [
                'order' => 'desc',
                'sort' => 'relevance',
                'q' => $text,
                'site' => 'stackoverflow'
            ],
        ]);

        if (200 !== $response->getStatusCode()) {
            throw new RuntimeException(
                'Http Request failed.'
            );
        }

        $body = json_decode((string)$response->getBody(), true);

        dump($body);

        $this->send($this->getCurrentChannel(), $this->getCurrentUser(), 'You want a response?');
    }
}