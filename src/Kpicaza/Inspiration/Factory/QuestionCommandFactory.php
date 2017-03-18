<?php

namespace Kpicaza\Inspiration\Factory;


use Interop\Container\ContainerInterface;
use Kpicaza\Inspiration\Command\QuestionCommand;

class QuestionCommandFactory
{
    /**
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(ContainerInterface $container)
    {
        /** @var BotCommandFactory $factory */
        $factory = $container->get(BotCommandFactory::class);

        return $factory->build(QuestionCommand::class, [
            $container->get('Kpicaza\Inspiration\QuestionClient')
        ]);
    }
}
