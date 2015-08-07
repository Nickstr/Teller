<?php  namespace Teller\Commands; 

use Illuminate\Support\ServiceProvider;
use Teller\Transactions\Commands\CreateTransaction;
use Teller\Transactions\Handlers\CreateTransactionHandler;

class CommandHandlerServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton(Bus::class, function ($app) {
            $bus = new Bus();
            $bus->register(CreateTransaction::class, new CreateTransactionHandler());
            return $bus;
        });
    }
}