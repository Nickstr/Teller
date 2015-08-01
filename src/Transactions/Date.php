<?php namespace Teller\Transactions;

use Carbon\Carbon;

class Date {
    /**
     * @var Carbon
     */
    private $date;

    private function __construct(Carbon $date) {
        $this->date = $date;
    }

    public static function fromString($date) {
        return new static(Carbon::createFromFormat('Ymd', $date));
    }

    public function getRawCarbon() {
        return $this->date;
    }

    public function readable() {
        return $this->date->format('F jS, Y');
    }
}
