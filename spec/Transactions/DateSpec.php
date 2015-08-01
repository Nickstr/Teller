<?php namespace spec\Teller\Transactions;

use Carbon\Carbon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Transactions\Date;

class DateSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedThrough('fromString', ['20150730']);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Date::class);
    }

    function it_should_return_a_carbon_object() {
        $this->getRawCarbon()->shouldHaveType(Carbon::class);
    }

    function it_should_return_a_data_string() {
        $this->readable()->shouldReturn("July 30th, 2015");
    }
}
