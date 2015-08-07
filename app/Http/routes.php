<?php

use League\Csv\Reader;

use Illuminate\Http\Request;
use Teller\Commands\Bus;
use Teller\Events\Dispatcher;
use Teller\Transactions\Commands\CreateTransactionCommand;

Route::get('/', function () {
    return view('welcome');
});

Route::post('upload-csv', function(Request $input, Bus $bus, Dispatcher $dispatcher) {
    $reader = Reader::createFromPath($input->file('csv'));
    $transactions = $reader->setOffset(1)->fetchAll();

    foreach($transactions as $transaction) {
        $event = $bus->dispatch(new CreateTransactionCommand(
            $transaction[0],
            $transaction[1],
            $transaction[2],
            $transaction[3],
            $transaction[4],
            $transaction[6],
            $transaction[8]
        ));
        $dispatcher->dispatch($event);
    }

});