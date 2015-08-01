<?php namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Accounts\Account;
use Teller\Transactions\Transaction;

class TransactionSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedThrough('createNew', [
            '20150730',
            'This is a shorter description that is really long',
            '1234567890',
            '0987654321',
            "GT",
            "This is a description"
        ]);
    }

    function it_is_initializable() {
        $this->shouldHaveType(Transaction::class);
    }

    function it_can_return_a_readable_date() {
        $this->readableDate()->shouldReturn("July 30th, 2015");
    }

    function it_can_return_a_from_account() {
        $this->from()->shouldHaveType(Account::class);
    }

    function it_can_return_a_to_account() {
        $this->to()->shouldHaveType(Account::class);
    }

    function it_can_return_a_transaction_type() {
        $this->type()->shouldReturn("Internetbankieren");
    }
}
