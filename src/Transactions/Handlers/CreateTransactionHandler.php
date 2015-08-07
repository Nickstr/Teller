<?php namespace Teller\Transactions\Handlers;

use Teller\Commands\Command;
use Teller\Commands\Handler;
use Teller\Transactions\Transaction;
use Teller\Transactions\TransactionWasCreated;

class CreateTransactionHandler implements Handler
{
    public function handle(Command $command) {
        $transaction = Transaction::createNew(
            $command->date,
            $command->name,
            $command->from,
            $command->to,
            $command->code,
            $command->amount,
            $command->description
        );

        return new TransactionWasCreated(
            $transaction->getId(),
            $transaction->getDate(),
            $transaction->getFrom()->name(),
            $transaction->getFrom()->getNumber(),
            $transaction->getTo()->getNumber(),
            $transaction->getCode(),
            $transaction->getAmount(),
            $transaction->getDescription()->full()
        );
    }
}