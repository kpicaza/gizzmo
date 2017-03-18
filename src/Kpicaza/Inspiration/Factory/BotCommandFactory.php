<?php

namespace Kpicaza\Inspiration\Factory;

use Kpicaza\Inspiration\Exception\RuntimeException;
use PhpSlackBot\Command\BaseCommand;

class BotCommandFactory
{
    public function build($fqcn, array $params = [])
    {
        $reflection = new \ReflectionClass($fqcn);

        if (false === $reflection->isSubclassOf(BaseCommand::class)) {
            throw new RuntimeException('The passed FQCN must implement ' . BaseCommand::class . '.');
        }

        return $reflection->newInstanceArgs($params);
    }
}
