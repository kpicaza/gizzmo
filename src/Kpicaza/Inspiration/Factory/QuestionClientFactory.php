<?php
/**
 * Created by PhpStorm.
 * User: kpicaza
 * Date: 18/03/17
 * Time: 19:22
 */

namespace Kpicaza\Inspiration\Factory;


use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;

class QuestionClientFactory
{
    const QUERY_STRING = '?order=desc&sort=activity&body=set%20default%20timezone&site=stackoverflow';

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
