<?php namespace Teller\Events;

use Teller\EventSourcing\Event;

class Dispatcher {
    private $listeners = [];

    public function register(Event $event, Listener $listener) {
        $this->listeners[get_class($event)][] = $listener;
    }

    public function dispatch(Event...$events) {
        foreach($events as $event) {
            $this->fireEvent($event);
        }
    }

    private function fireEvent(Event $event) {
        $listeners = $this->getListeners($event);
        foreach($listeners as $listener) {
            $listener->handle($event);
        }
    }

    private function getListeners(Event $event) {
        return $this->listeners[get_class($event)];
    }
}
