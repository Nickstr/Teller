<?php namespace spec\Teller\Events;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Events\Dispatcher;
use Teller\Events\Listener;
use Teller\EventSourcing\Event;

class DispatcherSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType(Dispatcher::class);
    }

    function it_can_register_listeners($event, $listener) {
        $event->beADoubleOf(Event::class);
        $listener->beADoubleOf(Listener::class);
        $this->register(get_class($event), $listener);
    }

    function it_can_dispatch_a_event($event, $listener) {
        $event->beADoubleOf(Event::class);
        $listener->beADoubleOf(Listener::class);
        $this->register(get_class($event), $listener);
        $this->dispatch($event);
        $listener->handle($event)->shouldBeCalled();
    }

    function it_can_dispatch_multiple_event($event, $listener) {
        $event->beADoubleOf(Event::class);
        $listener->beADoubleOf(Listener::class);
        $this->register(class_implements($event), $listener);
        $this->dispatch($event, $event);
        $listener->handle($event)->shouldBeCalled(2);
    }
}
