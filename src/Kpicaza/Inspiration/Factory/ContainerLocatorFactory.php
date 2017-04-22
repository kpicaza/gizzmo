<?php

namespace Kpicaza\Inspiration\Factory;


use Interop\Container\ContainerInterface;
use League\Tactician\Container\ContainerLocator;

class ContainerLocatorFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new ContainerLocator(
            $container,
            $config['tactician']['handler-map']
        );
    }
}