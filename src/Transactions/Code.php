<?php namespace Teller\Transactions;

class Code {
    private $descriptions = [
        'AC' => 'Acceptgiro',
        'BA' => 'Betaalautomaat',
        'CH' => 'Cheque',
        'DV' => 'Diversen',
        'GF' => 'Telefonisch Bankieren ',
        'GM' => 'Geldautomaat',
        'GT' => 'Internetbankieren',
        'IC' => 'Incasso',
        'OV' => 'Overschrijving',
        'PK' => 'Opname Kantoor',
        'PO' => 'Periodieke overschrijving',
        'R'  => 'Rente',
        'RV' => 'Reservering',
        'ST' => 'Storting',
    ];

    private $code;

    private function __construct($code) {
        if( ! array_key_exists($code, $this->descriptions))
            throw new TransactionCodeDoesNotExist;

        $this->code = $code;
    }

    public static function fromString($code) {
        return new static($code);
    }

    public function description() {
        return $this->descriptions[$this->code];
    }
}
