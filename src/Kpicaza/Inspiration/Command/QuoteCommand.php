<?php

namespace Kpicaza\Inspiration\Command;

use GuzzleHttp\ClientInterface;
use Inspiration\Quotes\DomainModel\QuoteClient;
use Inspiration\Quotes\DomainModel\QuoteRequestFactory;
use Inspiration\Quotes\DomainModel\QuoteResponder;
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
     * @var QuoteRequestFactory
     */
    private $requestFactory;

    /**
     * @var QuoteResponder
     */
    private $responder;

    /**
     * QuoteCommand constructor.
     *
     * @param QuoteClient $client
     * @param QuoteRequestFactory $requestFactory
     * @param QuoteResponder $responder
     */
    public function __construct(
        QuoteClient $client,
        QuoteRequestFactory $requestFactory,
        QuoteResponder $responder
    )
    {
        $this->client = $client;
        $this->requestFactory = $requestFactory;
        $this->responder = $responder;
    }

    /**
     * Configure bot command.
     */
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
        $body = $this->responder->getResponse(
            $this->client->get(
                $this->requestFactory->getRequest()
            )
        );

        $quote = sprintf(self::MESSAGE, $body['text'], $body['author'], $body['link']);

        $this->send($this->getCurrentChannel(), $this->getCurrentUser(), $quote);
    }
}
