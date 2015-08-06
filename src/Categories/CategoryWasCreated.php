<?php  namespace Teller\Categories; 

use Teller\EventSourcing\Event;

class CategoryWasCreated implements Event {
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $type;

    public function __construct($id, $title, $type) {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}