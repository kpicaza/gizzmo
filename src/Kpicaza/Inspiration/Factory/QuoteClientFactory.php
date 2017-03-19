<?php

namespace Kpicaza\Inspiration\Factory;

use GuzzleHttp\Client;
use Inspiration\Quotes\DomainModel\QuoteClient;
use Inspiration\Quotes\Infrastructure\Http\GuzzleQuoteClient;
use Interop\Container\ContainerInterface;

/**
 * Class QuoteClientFactory
 */
class QuoteClientFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return QuoteClient
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new GuzzleQuoteClient(
            new Client([
                'base_uri' => $config['slack.bot']['quotes.api.url'],
                'timeout' => 2.0,
            ])
        );
    }
}
