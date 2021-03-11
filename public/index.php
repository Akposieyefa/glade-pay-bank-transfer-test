<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use Akposieyefa\Core\BankTransaction;
use Akposieyefa\Libs\DotEnv;
use Akposieyefa\Core\VerifyTransaction;

(new DotEnv(__DIR__ . '/../.env'))->load();

// $trax = new BankTransaction();
// $response = $trax
//              ->amountCharged('1500')
//              ->customUserData(['email' => "orutu1@gmail.com","firstname"=>"Orutu", "lastname"=>"Akposieyefa"])
//              ->run();

// print_r($response);
//
//$verify= new VerifyTransaction('Glade2214920620210311O');
//$response = $verify->run();
//print_r($response);


