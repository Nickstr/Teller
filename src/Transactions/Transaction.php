<?php namespace Teller\Transactions;

use Teller\Accounts\Account;
use Teller\Categories\Category;
use Teller\EventSourcing\Event;
use Teller\EventSourcing\Stream;

class Transaction
{
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
    /**
     * @var Description
     */
    private $description;

    private $categories;

    private function __construct(Id $id, Date $date, Account $from, Account $to, Code $code, Description $description)
    {
        $this->id = $id;
        $this->date = $date;
        $this->from = $from;
        $this->to = $to;
        $this->code = $code;
        $this->description = $description;
    }

    public static function createNew($date, $name, $from, $to, $code, $description)
    {
        return new static(
            Id::generate(),
            Date::fromString($date),
            Account::fromNumber($from),
            Account::withName($name, $to),
            Code::fromString($code),
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
