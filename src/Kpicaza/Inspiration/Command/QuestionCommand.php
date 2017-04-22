<?php

namespace Kpicaza\Inspiration\Command;

use GuzzleHttp\ClientInterface;
use Inspiration\Questions\DomainModel\QuestionRequestCommand;
use Kpicaza\Inspiration\Exception\RuntimeException;
use Kpicaza\Inspiration\Factory\RequestCommandFactory;
use League\Tactician\CommandBus;
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
     * @var RequestCommandFactory
     */
    private $commandFactory;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * QuoteClientFactory constructor.
     *
     * @param ClientInterface $client
     */
    public function __construct(
        ClientInterface $client,
        RequestCommandFactory $commandFactory,
        CommandBus $commandBus
    )
    {
        $this->client = $client;
        $this->commandFactory = $commandFactory;
        $this->commandBus = $commandBus;
    }

    protected function configure()
    {
        $this->setName(self::NAME);
    }

    protected function execute($message, $context)
    {
        $text = substr($message['text'], 0, strlen(self::NAME));

        $command = $this->commandFactory->build(QuestionRequestCommand::class, [$text]);

        $answer =  $this->commandBus->handle($command);

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
