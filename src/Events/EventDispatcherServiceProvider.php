<?php  namespace Teller\Events; 

use Illuminate\Support\ServiceProvider;
use Teller\Transactions\TransactionWasCreated;

class EventDispatcherServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton(Dispatcher::class, function ($app) {
            $dispatcher = new Dispatcher();
            $dispatcher->register(TransactionWasCreated::class, CreateTransactionHandler::class);
            return $dispatcher;
        });
    }
}