<?php namespace Teller\Accounts;

class Name {
    private $name;

    private function __construct($name) {
        $this->name = $name;
    }

    public static function fromString($name) {
        return new static($name);
    }

    public function short() {
        return substr($this->name, 0, 17) . "...";
    }

    public function long() {
        return $this->name;
    }
}
