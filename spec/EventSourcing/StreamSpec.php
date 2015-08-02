<?php namespace spec\Teller\EventSourcing;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\EventSourcing\Event;
use Teller\EventSourcing\Stream;

class StreamSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType(Stream::class);
    }

    function it_can_hold_events($event) {
        $event->beADoubleOf(Event::class);
        $this->addEvent($event);
        $this->totalEvents()->shouldBe(1);
    }
}
