<?php namespace Teller\Transactions;

use Illuminate\Support\Collection;
use Teller\Accounts\Account;

class Transactions extends Collection {
    public function addTransaction(Transaction $transaction) {
        $this->push($transaction);
    }

    public function totalTransactions() {
        return $this->count();
    }

    public function transactionsTo(Account $account) {
        return $this->filter(function($transaction) use ($account) {
            return $transaction->to()->equals($account);
        });
    }

    public function transactionsFrom(Account $account) {
        return $this->filter(function($transaction) use ($account) {
            return $transaction->from()->equals($account);
        });
    }
}
