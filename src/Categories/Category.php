<?php namespace Teller\Categories;

use Rhumsaa\Uuid\Uuid;
use Teller\EventSourcing\Stream;

class Category {
    private $id;
    private $title;
    private $type;

    private function __construct(Id $id, $title, $type) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
    }

    public static function createNew($title, $type) {
        return new static(Id::generate(), $title, $type);
    }

    public function replay(Stream $stream) {
        foreach ($stream->replay() as $event) {
            switch (get_class($event)) {
                case CategoryWasCreated::class:
                    $this->id = Uuid::fromString($event->getId());
                    $this->title = $event->getTitle();
                    $this->type=  $event->getType();
            }
        }
        return $this;
    }
}
