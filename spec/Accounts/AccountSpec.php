<?php namespace spec\Teller\Accounts;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Accounts\Account;

class AccountSpec extends ObjectBehavior {
    function let() {
        $this->beConstructedThrough('withName', ['Random Name', '0987654321']);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Account::class);
    }

    function it_should_be_able_to_truncate() {
        $this->name()->shouldReturn("Random Name");
    }

    function it_can_compare_account() {
        $this->equals(Account::fromNumber('0987654321'))->shouldReturn(true);
    }
}
