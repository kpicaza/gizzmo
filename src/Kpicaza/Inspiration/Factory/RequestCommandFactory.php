<?php

namespace Kpicaza\Inspiration\Factory;

use Kpicaza\Inspiration\Exception\InvalidArgumentException;
use Kpicaza\Objects\Command;

/**
 * Class RequestCommandFactory
 */
class RequestCommandFactory
{
    /**
     * @param array $params
     */
    public function build(string $fqcn, array $params): Command
    {
        try {
            $reflection = new \ReflectionClass($fqcn);

            /** @var Command $command */
            $command = $reflection->newInstanceArgs($params);

            if (false === $command instanceof Command) {
                throw new InvalidArgumentException(
                    'The FQCN must implement ' . Command::class . '.'
                );
            }

        } catch (\ReflectionException $e) {
            throw new InvalidArgumentException(
                'The FQCN must be valid Class name.'
            );
        }

        return $command;
    }
}
