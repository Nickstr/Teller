<?php

use Illuminate\Bus\Dispatcher;
use League\Csv\Reader;

use Illuminate\Http\Request;
use Teller\Transactions\Commands\CreateTransaction;

Route::get('/', function () {
    return view('welcome');
});

Route::post('upload-csv', function(Request $input, Dispatcher $bus) {
    $reader = Reader::createFromPath($input->file('csv'));
    $transactions = $reader->setOffset(1)->fetchAll();

    foreach($transactions as $transaction) {
        $bus->dispatch(new CreateTransaction(
            $transaction[0],
            $transaction[1],
            $transaction[2],
            $transaction[3],
            $transaction[4],
            $transaction[5]
        ));
        dd($transaction);
    }
});