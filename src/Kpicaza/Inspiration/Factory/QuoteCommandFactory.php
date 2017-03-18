<?php

namespace Kpicaza\Inspiration\Factory;

use Interop\Container\ContainerInterface;
use Kpicaza\Inspiration\Command\QuoteCommand;

/**
 * Class QuoteCommandFactory
 */
class QuoteCommandFactory
{
    /**
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(ContainerInterface $container)
    {
        /** @var BotCommandFactory $factory */
        $factory = $container->get(BotCommandFactory::class);

        return $factory->build(QuoteCommand::class, [
            $container->get('Kpicaza\Inspiration\QuoteClient')
        ]);
    }
}
