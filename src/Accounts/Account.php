<?php namespace Teller\Accounts;

class Account {
    /**
     * @var Id
     */
    private $id;

    /**
     * @var Name
     */
    private $name;

    private $number;

    private function __construct(Id $id, Name $name = null, $number) {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
    }

    public static function withName($name, $number) {
        return new static(Id::generate(), Name::fromString($name), $number);
    }

    public static function fromNumber($from) {
        return new static(Id::generate(), null, $from);
    }

    public function name() {
        return $this->name->long();
    }

    public function getNumber() {
        return $this->number;
    }

    public function equals(Account $that) {
        return $this->number == $that->number;
    }
}
