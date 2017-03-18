<?php

namespace Kpicaza\Inspiration;

use Kpicaza\Inspiration\Exception\InvalidConfigurationException;
use Kpicaza\Inspiration\Factory\BotCommandFactory;
use PhpSlackBot\Bot;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunBotCommand extends Command
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var array
     */
    private $commands = [];

    /**
     * RunBotCommand constructor.
     *
     * @param null $name
     * @param array $config
     * @param BotCommandFactory $factory
     */
    public function __construct($name = null, array $config = [])
    {
        parent::__construct($name);

        $this->assertConfig($config);
        $this->config = $config;
    }

    /**
     * {@Inheritdoc}
     */
    public function configure()
    {
        $this->setName('inspiration:bot:run');
        $this->setDescription('Run inspiration bot server.');
    }

    /**
     * @param array $commands
     */
    public function addCommands(array $commands)
    {
        $this->commands = array_merge(
            $this->commands,
            $commands
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $bot = new Bot();
        $bot->setToken($this->config['token']); // Get your token here https://my.slack.com/services/new/bot

        foreach ($this->commands as $command) {
            $bot->loadCommand($command);
        }

        $bot->loadInternalCommands(); // This loads example commands
        $bot->run();
    }

    /**
     * @param array $config
     */
    private function assertConfig(array $config)
    {
        if (false === array_key_exists('token', $config)) {
            throw new InvalidConfigurationException(
                'token config param is mandatory.'
            );
        }
    }
}
