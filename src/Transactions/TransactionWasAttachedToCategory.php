<?php  namespace Teller\Transactions; 

use Teller\EventSourcing\Event;

class TransactionWasAttachedToCategory implements Event {
    private $categoryId;

    public function __construct($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /** @return string */
    public function getStreamId()
    {
        // TODO: Implement getStreamId() method.
    }

    /** @return array */
    public function getData()
    {
        // TODO: Implement getData() method.
    }
}