<?php namespace Teller\EventSourcing;

interface Event {
    /** @return string */
    public function getStreamId();

    /** @return array */
    public function getData();
}