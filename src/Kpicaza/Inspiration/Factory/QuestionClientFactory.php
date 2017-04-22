<?php

namespace Kpicaza\Inspiration\Factory;

use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;

class QuestionClientFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return Client
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new Client([
            'base_uri' => $config['slack.bot']['question.api.url'],
            'timeout' => 8.0,
        ]);
    }
}
