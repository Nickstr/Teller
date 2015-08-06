<?php namespace Teller\Events;

use Teller\EventSourcing\Event;

interface Listener {
    public function handle(Event $event);
}
