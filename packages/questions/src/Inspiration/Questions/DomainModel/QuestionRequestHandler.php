<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Class QuestionRequestHandler
 */
class QuestionRequestHandler
{
    const ORDER = 'desc';
    const SORT = 'relevance';
    const SITE = 'stackoverflow';

    /**
     * @var QuestionClient
     */
    private $client;

    /**
     * @var QuestionRequestFactory
     */
    private $requestFactory;

    /**
     * QuestionRequestHandler constructor.
     *
     * @param QuestionClient $questionClient
     * @param QuestionRequestFactory $requestFactory
     */
    public function __construct(
        QuestionClient $questionClient,
        QuestionRequestFactory $requestFactory
    )
    {
        $this->client = $questionClient;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param QuestionRequestCommand $questionRequestCommand
     */
    public function handle(QuestionRequestCommand $questionRequestCommand)
    {
        $response = $this->client->get(
            $this->requestFactory->build([
                'order' => self::ORDER,
                'sort' => self::SORT,
                'q' => $questionRequestCommand->question(),
                'site' => self::SITE
            ])
        );


    }
}
