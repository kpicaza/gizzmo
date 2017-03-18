<?php

namespace Kpicaza\Inspiration\Command;

use GuzzleHttp\ClientInterface;
use Kpicaza\Inspiration\Exception\RuntimeException;
use PhpSlackBot\Command\BaseCommand;

/**
 * Class HelloCommand
 */
class QuoteCommand extends BaseCommand
{
    const MESSAGE = "\r\n>>> %s \r\n *%s* \r\n %s";

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
        $this->setName('inspire me');
    }

    /**
     * @param $message
     * @param $context
     */
    protected function execute($message, $context)
    {
        $response = $this->client->request('GET', '');

        if (200 !== $response->getStatusCode()) {
            throw new RuntimeException(
                'Http Request failed.'
            );
        }

        $body = json_decode((string)$response->getBody(), true);

        if (
            null === $body
            || false === array_key_exists('quoteText', $body)
            || true === empty($body['quoteText'])
        ) {
            return;
        }

        $quote = sprintf(
            self::MESSAGE,
            $body['quoteText'],
            $body['quoteAuthor'],
            $body['quoteLink']
        );

        $this->send($this->getCurrentChannel(), $this->getCurrentUser(), $quote);
    }
}
