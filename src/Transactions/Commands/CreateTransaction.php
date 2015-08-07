<?php  namespace Teller\Transactions\Commands; 

use Teller\Commands\Command;

class CreateTransaction implements Command {
    /**
     * @var
     */
    public $date;
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $from;
    /**
     * @var
     */
    public $to;
    /**
     * @var
     */
    public $code;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $amount;

    public function __construct($date, $name, $from, $to, $code, $amount, $description) {
        $this->date = $date;
        $this->name = $name;
        $this->from = $from;
        $this->to = $to;
        $this->code = $code;
        $this->description = $description;
        $this->amount = $amount;
    }
}