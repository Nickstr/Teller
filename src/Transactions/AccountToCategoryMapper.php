<?php namespace Teller\Transactions;

interface AccountToCategoryMapper {
    public function addMapping($accountFrom, $accountTo, $category);
}