<?php namespace Teller\Transactions;

class Description {
    private $description;

    private function __construct($description) {
        $this->description = $description;
    }

    public static function fromString($description) {
        return new static($description);
    }

    public function full() {
        return $this->description;
    }
}
