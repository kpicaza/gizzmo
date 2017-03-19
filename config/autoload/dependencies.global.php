<?php
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            Kpicaza\Inspiration\Factory\BotCommandFactory::class => Kpicaza\Inspiration\Factory\BotCommandFactory::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
        ],
    ],
];
