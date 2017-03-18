<?php

namespace Kpicaza\Inspiration\Command;

use PhpSlackBot\Command\BaseCommand;

/**
 * Class HelloCommand
 */
class HelloCommand extends BaseCommand
{

    protected function configure()
    {
        $this->setName('Hello');
    }

    protected function execute($message, $context)
    {
        $this->send($this->getCurrentChannel(), $this->getCurrentUser(), 'Hello!!');
    }
}
