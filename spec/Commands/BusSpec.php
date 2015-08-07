<?php namespace spec\Teller\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Commands\Bus;
use Teller\Commands\Command;
use Teller\Commands\Handler;
use Teller\Commands\HandlerForCommandNotFound;

class BusSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType(Bus::class);
    }

    function it_can_register_a_handler($command, $handler) {
        $command->beADoubleOf(Command::class);
        $handler->beADoubleOf(Handler::class);
        $this->register(get_class($command), $handler);
    }

    function it_can_dispatch_a_command($command, $handler) {
        $command->beADoubleOf(Command::class);
        $handler->beADoubleOf(Handler::class);
        $this->register(get_class($command), $handler);
        $this->dispatch($command);
        $handler->handle($command)->shouldBeCalled();
    }

    function it_throws_a_exception_when_no_handler_is_registered_for_command($command, $secondCommand, $handler) {
        $command->beADoubleOf(Command::class);
        $secondCommand->beADoubleOf(Command::class);
        $handler->beADoubleOf(Handler::class);
        $this->register(get_class($command), $handler);
        $this->shouldThrow(HandlerForCommandNotFound::class)->duringdispatch($secondCommand);
    }
}
