<?php namespace spec\Teller\Accounts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Accounts\Name;

class NameSpec extends ObjectBehavior {
    function let() {
        $this->beConstructedThrough('fromString', ['This is a shorter description that is really long']);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Name::class);
    }

    function it_should_be_able_to_return_the_full_description() {
        $this->long()->shouldReturn("This is a shorter description that is really long");
    }

    function it_should_be_able_to_truncate() {
        $this->short()->shouldReturn("This is a shorter...");
    }
}
