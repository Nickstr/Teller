<?php

namespace spec\Teller\Transactions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teller\Transactions\ArrayAccountToCategoryMapper;

class ArrayAccountToCategoryMapperSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType(ArrayAccountToCategoryMapper::class);
    }

    function it_can_add_a_map() {
        $this->addMapping('from', 'to', 12345);
        $this->getMaps()->shouldHaveCount(1);
    }

    function it_ignores_duplicate_maps() {
        $this->addMapping('from', 'to', 12345);
        $this->addMapping('from', 'to', 12345);
        $this->getMaps()->shouldHaveCount(1);
    }
}
