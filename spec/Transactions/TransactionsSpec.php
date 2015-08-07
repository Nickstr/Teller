<?php namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Accounts\Account;
use Teller\Transactions\Transaction;
use Teller\Transactions\Transactions;

class TransactionsSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType(Transactions::class);
    }

    function it_should_add_transactions() {
        $this->addTransaction(Transaction::createNew('20150730',
            'This is a shorter description that is really long',
            '1234567890',
            '0987654321',
            "GT",
            "30,00",
            "This is a description")
        );
        $this->totalTransactions()->shouldBe(1);
    }

    function it_should_filter_on_to_account() {
        $this->addTransaction(Transaction::createNew('20150730',
            'This is a shorter description that is really long',
            '1234567890',
            '0987654321',
            "GT",
            "30,00",
            "This is a description")
        );
        $this->transactionsTo(Account::fromNumber("0987654321"))->count()->shouldBe(1);
        $this->transactionsFrom(Account::fromNumber("0987654321"))->count()->shouldBe(0);
    }
}
