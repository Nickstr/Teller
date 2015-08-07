<?php namespace Teller\Transactions;

use Teller\Accounts\Account;
use Teller\EventSourcing\Event;
use Teller\EventSourcing\Stream;

class Transaction
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @return Id
     */
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
    /**
     * @var Description
     */
    private $description;

    private $categories;
    /**
     * @var Amount
     */
    private $amount;

    private function __construct(Id $id, Date $date, Account $from, Account $to, Code $code, Amount $amount, Description $description)
    {
        $this->id = $id;
        $this->date = $date;
        $this->from = $from;
        $this->to = $to;
        $this->code = $code;
        $this->description = $description;
        $this->amount = $amount;
    }

    public static function createNew($date, $name, $from, $to, $code, $amount, $description)
    {
        return new static(
            Id::generate(),
            Date::fromString($date),
            Account::withName($name, $to),
            Account::fromNumber($from),
            Code::fromString($code),
            Amount::fromString($amount),
            Description::fromString($description)
        );
    }

    public function readableDate()
    {
        return $this->date->readable();
    }

    public function from()
    {
        return $this->from;
    }

    public function to()
    {
        return $this->to;
    }

    public function type()
    {
        return $this->code->description();
    }

    public function getCategories() {
        return $this->categories;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return Account
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return Account
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return Code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    public function replay(Stream $stream)
    {
        /** @var Event $event */
        foreach ($stream->replay() as $event) {
            switch (get_class($event)) {
                case TransactionWasCreated::class:
                    $this->id = Id::fromString($event->getId());
                    $this->date = Date::fromString($event->getDate());
                    $this->from = Account::fromNumber($event->getFrom());
                    $this->to = Account::withName($event->getTo(), $event->getName());
                    $this->code = Code::fromString($event->getCode());
                    $this->amount = Amount::fromString($event->getAmount());
                    $this->description = Description::fromString($event->getDescription());
                    break;
                case TransactionWasAttachedToCategory::class:
                    $this->categories[] = $event->getCategoryId();
                    break;
            }
        }
        return $this;
    }
}
