<?php

namespace Akposieyefa\Core;

use Akposieyefa\GladePay\Glade;
use Exception;

class BankTransaction extends Glade
{

       /**
        * @var string
        */
       protected $amount;

       /**
        * @var Array
        */
       protected $customerData;

       /**
        * @var string
        */
       protected $currency;

       /**
        * @var string
        */
       protected $country;

       /**
        * @var string
        */
       protected $defaultCustomerCountry = 'NG';
       /**
        * @var string
        */
       protected $defaultCurrency = 'NGN';

       /**
        * Amount to be charged
        * @return object
        * @param string $amount
        */
       public function amountCharged(string $amount)
       {
              $this->amount = $amount;
              return $this;
       }

       public function getAmountCharged(){
           return $this->amount;
       }

    /**
     * Takes array as Customer data.
     * @param array $data
     * @return object
     */
       public function customUserData(array $data)
       {
              $this->customerData = $data;
              return $this;
       }

       /**
        * Optional method. Set to currency that for the transaction
       * @return object
       * @param string $currency
       */
       public function currency(string $currency)
       {
              $this->currency = $currency;
              return $this;
       }

    /**
     * Optional method. Set to country that for transaction
     * @param string $country
     * @return object
     */
       public function country(string $country)
       {
              $this->country = $country;
              return $this;
       }

       /**
         * Prepare data to be sent in the gladeApiBody
         * @return array | Exception
         * @throws Exception
        */
       protected function gladeApiBody(): array
       {
              if ($this->amount === "") {
                     throw new Exception('Amount cannot be empty');
              }
   
             return [
               'action' => 'charge',
               'paymentType' => 'bank_transfer',
               'amount' => $this->amount,
               'currency' => is_null($this->currency)?$this->defaultCustomerCountry:$this->currency,
               'country' => is_null($this->country)?$this->defaultCustomerCountry:$this->country,
               'user' =>  $this->customerData
           ];
       }
}
