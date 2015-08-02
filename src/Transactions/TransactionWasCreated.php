<?php  namespace Teller\Transactions; 

use Teller\EventSourcing\Event;

class TransactionWasCreated implements Event {

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $date;
    /**
     * @var
     */
    private $from;
    /**
     * @var
     */
    private $to;
    /**
     * @var
     */
    private $code;
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $name;

    public function __construct($id, $date, $name, $from, $to, $code, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->from = $from;
        $this->to = $to;
        $this->code = $code;
        $this->description = $description;
    }

    public function getStreamId() {
        // TODO: Implement getStreamId() method.
    }

    public function getData() {
        // TODO: Implement getData() method.
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}