<?php

namespace Akposieyefa\Core;

use Akposieyefa\GladePay\Glade;
use Exception;

class VerifyTransaction extends Glade
{
    /**
     * @var string
     */
    private $txnRef;

    /**
    * Verify transaction with transaction reference token
    * @return void
    * @param string $txnRef
    */
    public function __construct(string $txnRef)
    {
        $this->txnRef =  $txnRef;
    }

    /**
     * Prepare data to be sent in the gladeApiBody
     * @return array | Exception
     * @throws Exception
     */
    protected function gladeApiBody()
    {
        if ($this->txnRef === "") {
              throw new Exception('Transaction reference cannot be empty');
        }

        return [
            'action' => 'verify',
            'txnRef' => $this->txnRef
        ];
    }
}