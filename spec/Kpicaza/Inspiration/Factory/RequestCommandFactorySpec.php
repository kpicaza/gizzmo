<?php

namespace spec\Kpicaza\Inspiration\Factory;

use Inspiration\Questions\DomainModel\QuestionRequestCommand;
use Kpicaza\Inspiration\Exception\InvalidArgumentException;
use Kpicaza\Inspiration\Factory\RequestCommandFactory;
use Kpicaza\Objects\Command;
use Kpicaza\Objects\Title;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RequestCommandFactorySpec extends ObjectBehavior
{
    const FQCN = QuestionRequestCommand::class;
    const OTHER_FQCN = Title::class;
    const INVALID_FQCN = 'Some\Class';

    function it_should_thrown_an_invalid_argument_exception_if_given_fqcn_is_invalid()
    {
        $this->shouldThrow(
            InvalidArgumentException::class
        )->during('build', [self::INVALID_FQCN, []]);
    }

    function it_should_thrown_an_invalid_argument_exception_if_sqcn_is_not_an_implementation_of_command_class()
    {
        $this->shouldThrow(
            InvalidArgumentException::class
        )->during('build', [self::OTHER_FQCN, ['some large string to valid title']]);
    }

    function it_should_create_new_request_command_objects_with_given_params()
    {
        $this->build(self::FQCN, ['some question'])->shouldBeAnInstanceOf(Command::class);
    }
}
