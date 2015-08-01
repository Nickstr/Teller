<?php namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Transactions\Code;
use Teller\Transactions\TransactionCodeDoesNotExist;

class CodeSpec extends ObjectBehavior {

    function let() {
        $this->beConstructedThrough('fromString', ['GT']);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Code::class);
    }

    function it_can_return_the_correct_type() {
        $this->description()->shouldReturn("Internetbankieren");
    }

    function it_should_return_an_exception_if_the_code_doesnt_exist() {
        $this->beConstructedThrough('fromString', ['does-not-exist']);
        $this->shouldThrow(TransactionCodeDoesNotExist::class)->duringInstantiation();
    }
}
