<?php

namespace spec\Teller\Categories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rhumsaa\Uuid\Uuid;
use Teller\Categories\Category;
use Teller\Categories\CategoryWasCreated;
use Teller\EventSourcing\Stream;

class CategorySpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedThrough('createNew', ['title', 'type']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_can_be_created_from_stream() {
        $stream = new Stream();
        $stream->addEvent(new CategoryWasCreated(Uuid::uuid4(), "Groceries", "Food"));
        $this->replay($stream)->shouldHaveType(Category::class);
    }
}
