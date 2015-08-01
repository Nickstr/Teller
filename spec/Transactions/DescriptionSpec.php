<?php namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Transactions\Description;

class DescriptionSpec extends ObjectBehavior {

    function let() {
        $this->beConstructedThrough('fromString', ['Pasvolgnr:007 28-07-2015 23:21 Transactie:268479 Term:HV0M06']);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Description::class);
    }

    function it_should_be_able_to_return_the_full_description() {
        $this->full()->shouldReturn("Pasvolgnr:007 28-07-2015 23:21 Transactie:268479 Term:HV0M06");
    }
}
