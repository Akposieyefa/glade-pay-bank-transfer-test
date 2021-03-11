<?php

namespace Akposieyefa\Test\Core;

use Akposieyefa\Core\BankTransaction;
use PHPUnit\Framework\TestCase;

class BankTransactionTest extends TestCase
{
    public  $response;
    public $amount;
    protected  function setUp():void{
        parent::setUp();

        $trax = new BankTransaction();
        $this->amount = "2000";
        $this->response = $trax
            ->amountCharged($this->amount)
            ->customUserData(['email' => "orutu1@gmail.com","firstname"=>"Orutu", "lastname"=>"Akposieyefa"])
            ->run();

    }

    public function test_init_bank_transaction_amount(){
        $this->assertEquals($this->response->amount, $this->amount);

    }

    public function test_bank_account_data(){
        $this->assertTrue(isset($this->response->accountNumber));
        $this->assertNotEmpty($this->response->accountNumber);
        $this->assertTrue(isset($this->response->accountName));
        $this->assertNotEmpty($this->response->accountName);
    }


    public function test_transaction_status_is_successful(){
        $this->assertTrue($this->response->status === 202);
    }

}
