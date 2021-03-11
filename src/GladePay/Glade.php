<?php 

namespace Akposieyefa\GladePay;

use Exception;
use Akposieyefa\Inter\IRun;

abstract class Glade  implements IRun
{ 
       abstract protected function gladeApiBody();
       
       public $apiMethod = 'payment';
       protected $body = [];

       public function apiUrl(): string
       {
              return getenv('GladeUrl').$this->apiMethod;
       }

       public function apiHeaders(): array
       {
              return  [
                     "key:".getenv('Merchant_Key'),
                     "mid:".getenv('Merchant_ID'),
                     "content-type:".getenv('AppType')
              ];
       }

       public function run()
       {
              $this->body = $this->gladeApiBody();
              return $this->gladeApiRequest();
       }

       public  function gladeApiRequest()
       {
              $curl = curl_init();
              $options = [
                     CURLOPT_URL => $this->apiUrl(),
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_ENCODING => "",
                     CURLOPT_MAXREDIRS => 10,
                     CURLOPT_TIMEOUT => 30,
                     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                     CURLOPT_CUSTOMREQUEST => "PUT",
                     CURLOPT_POSTFIELDS => json_encode($this->body),
                     CURLOPT_HTTPHEADER => $this->apiHeaders(),
              ];
              curl_setopt_array($curl,$options);
           try {
               return $this->apiResponseHandler($curl);
           } catch (Exception $e) {
               return  $e->getMessage();
           }
       }


    /**
     * @param $curl
     * @return mixed
     * @throws Exception
     * data
     */
       private function apiResponseHandler($curl)
       {
              $response = curl_exec($curl);
              $err = curl_error($curl);
              curl_close($curl);
              if ($err) {
                     throw new Exception($err);
              }
           $data = json_decode($response);
              return $data;
       }

     
}