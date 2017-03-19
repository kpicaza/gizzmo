<?php

return [
    'slack.bot' => [
        'token' => 'TOKEN',
        'quotes.api.url' => 'http://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=en&key=999999',
        'question.api.url' => 'http://api.stackexchange.com/2.2/search/advanced',
    ],
    'dependencies' => [
        'invokables' => [
            Kpicaza\Inspiration\Command\HelloCommand::class =>
                Kpicaza\Inspiration\Command\HelloCommand::class,
            Inspiration\Quotes\DomainModel\QuoteRequestFactory::class =>
                Inspiration\Quotes\Infrastructure\Forismatic\QuoteRequestFactory::class,
            Inspiration\Quotes\DomainModel\QuoteResponder::class =>
                Inspiration\Quotes\Infrastructure\Forismatic\QuoteResponder::class
        ],
        'factories' => [
            Kpicaza\Inspiration\Command\QuoteCommand::class =>
                Kpicaza\Inspiration\Factory\QuoteCommandFactory::class,
            Inspiration\Quotes\DomainModel\QuoteClient::class =>
                Kpicaza\Inspiration\Factory\QuoteClientFactory::class,
            Kpicaza\Inspiration\Command\QuestionCommand::class =>
                Kpicaza\Inspiration\Factory\QuestionCommandFactory::class,
            'Kpicaza\Inspiration\QuestionClient' =>
                Kpicaza\Inspiration\Factory\QuestionClientFactory::class,
        ]
    ]
];
