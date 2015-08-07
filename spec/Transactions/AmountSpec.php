<?php

namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AmountSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedThrough('fromString', ['30,00']);
    }

    function it_is_initializable() {
        $this->shouldHaveType('Teller\Transactions\Amount');
    }
}
