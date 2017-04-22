<?php

return [
    'dependencies' => [
        'invokables' => [
            Kpicaza\Inspiration\Factory\RequestCommandFactory::class =>
                Kpicaza\Inspiration\Factory\RequestCommandFactory::class,
            \Inspiration\Questions\DomainModel\QuestionRequestHandler::class =>
                \Inspiration\Questions\DomainModel\QuestionRequestHandler::class
        ],
        'factories' => [
            \League\Tactician\Container\ContainerLocator::class =>
                \Kpicaza\Inspiration\Factory\ContainerLocatorFactory::class
        ]
    ],
    'middleware' => [
        League\Tactician\Plugins\LockingMiddleware::class => 500,
    ],
    'tactician' => [
        'default-locator' => \League\Tactician\Container\ContainerLocator::class,
        'handler-map' => [
            Inspiration\Questions\DomainModel\QuestionRequestCommand::class =>
                Inspiration\Questions\DomainModel\QuestionRequestHandler::class,
        ],
    ],
];
