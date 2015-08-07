<?php namespace Teller\EventSourcing;

use Rhumsaa\Uuid\Uuid;

abstract class AggregateId {
    /** @var string */
    private $id;

    public static function generate() {
        return new static(Uuid::uuid4());
    }

    protected function __construct($id) {
        $this->id = $id;
    }

    public static function fromString($id) {
        return new static($id);
    }

    public function __toString() {
        return $this->toString();
    }

    public function toString() {
        return $this->id;
    }
}