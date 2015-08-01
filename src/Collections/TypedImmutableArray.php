<?php namespace Teller\Collections;

abstract class TypedImmutableArray extends ImmutableArray {
    public function __construct(array $items) {
        foreach ($items as $item)
            $this->typeGuard($item);
        $this->items = $items;
    }
    abstract protected function typeGuard($item);
}