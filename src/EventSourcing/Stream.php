<?php namespace Teller\EventSourcing;

class Stream {
    private $events = [];

    public function addEvent(Event $event) {
        $this->events[] = $event;
    }

    public function totalEvents() {
        return count($this->events);
    }

    public function replay() {
        return $this->events;
    }
}
