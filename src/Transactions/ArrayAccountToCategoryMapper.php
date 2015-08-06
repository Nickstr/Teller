<?php namespace Teller\Transactions;

class ArrayAccountToCategoryMapper implements AccountToCategoryMapper {
    private $maps = [];

    public function addMapping($accountFrom, $accountTo, $category) {
        $map = [$accountFrom, $accountTo, $category];

        if( ! $this->exists($map)) {
            $this->maps[] = $map;
        }
    }

    public function getMaps() {
        return $this->maps;
    }

    private function exists($map) {
        return in_array($map, $this->maps, true);
    }
}