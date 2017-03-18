<?php

namespace Kpicaza\Inspiration\Factory;

use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;

/**
 * Class QuoteClientFactory
 */
class QuoteClientFactory
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
            'base_uri' => $config['slack.bot']['quotes.api.url'],
            'timeout'  => 2.0,
        ]);
    }
}
