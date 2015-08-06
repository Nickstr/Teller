<?php namespace Teller\Commands;

interface Handler {
    public function handle(Command $command);
}
