<?php namespace Teller\Commands;

class Bus {
    private $handlers = [];

    public function register($command, Handler $handler) {
        $this->handlers[$command] = $handler;
    }

    public function dispatch(Command $command) {
        return $this->getHandler($command)->handle($command);
    }

    private function getHandler(Command $command) {
        if( ! array_key_exists(get_class($command), $this->handlers))
            throw new HandlerForCommandNotFound();

        return $this->handlers[get_class($command)];
    }
}
