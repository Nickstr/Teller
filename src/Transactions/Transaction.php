<?php namespace Teller\Transactions;

use Teller\Accounts\Account;

class Transaction {
    /**
     * @var Id
     */
    private $id;
    /**
     * @var Date
     */
    private $date;
    /**
     * @var Account
     */
    private $from;
    /**
     * @var Account
     */
    private $to;
    /**
     * @var Code
     */
    private $code;

    private function __construct(Id $id, Date $date, Account $from, Account $to, Code $code) {
        $this->id = $id;
        $this->date = $date;
        $this->from = $from;
        $this->to = $to;
        $this->code = $code;
    }

    public static function createNew($date, $name, $from, $to, $code) {
        return new static(
            Id::generate(),
            Date::fromString($date),
            Account::fromNumber($from),
            Account::withName($name, $to),
            Code::fromString($code)
        );
    }

    public function readableDate() {
        return $this->date->readable();
    }

    public function from() {
        return $this->from;
    }

    public function to() {
        return $this->to;
    }

    public function type() {
        return $this->code->description();
    }
}
