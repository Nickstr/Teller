<?php namespace Teller\Transactions;

class Amount {
    private $amount;

    private function __construct($amount) {
        $this->amount = $amount;
    }

    public static function fromString($amount) {
        return new static($amount);
    }
}
