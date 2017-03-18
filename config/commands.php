<?php

/** @var Kpicaza\Inspiration\RunBotCommand $botConsole */
$botConsole = new \Kpicaza\Inspiration\RunBotCommand(
    null,
    $container->get('config')['slack.bot']
);

$botConsole->addCommands([
    $container->get(\Kpicaza\Inspiration\Command\HelloCommand::class),
    $container->get(\Kpicaza\Inspiration\Command\QuoteCommand::class),
    $container->get(\Kpicaza\Inspiration\Command\QuestionCommand::class),
]);

/** @var \Symfony\Component\Console\Application $application */
$application->addCommands([
    $botConsole
]);
