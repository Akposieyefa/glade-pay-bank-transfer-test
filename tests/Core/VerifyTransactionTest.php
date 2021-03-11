<?php

namespace Akposieyefa\Test\Core;

use Akposieyefa\Core\VerifyTransaction;
use PHPUnit\Framework\TestCase;
use Exception;

class VerifyTransactionTest extends TestCase
{
    protected  function setUp():void{
        parent::setUp();

    }

    public function test_transaction_not_having_id(){

        $this->expectException(Exception::class);
        $verify= new VerifyTransaction("");
        $verify->run();
    }

    public function test_transaction_having_correct_id(){
        $id = "Glade2214920620210311O";
        $verify= new VerifyTransaction($id);
        $response = $verify->run();
        $this->assertEquals($response->txnRef, $id);
        $this->assertNotEmpty($response->txnRef);

    }

    public function test_invalid_transaction_id(){
        $id="Glade41234123432423432";
        $verify = new VerifyTransaction($id);
        $response = $verify->run();
        $this->assertEquals($response->status, 104);
        $this->assertEquals($response->message, "Invalid Transaction Reference");
    }

    public function test_successful_payment_status(){
        $id = "Glade2214920620210311O";
        $verify= new VerifyTransaction($id);
        $response = $verify->run();
        $this->assertEquals($response->status, 200);
    }


}
