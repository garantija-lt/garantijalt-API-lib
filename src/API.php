<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\Exception\ValidationException;
use Garantijalt\Contract;
use Garantijalt\Customer;
use Garantijalt\Product;
use Garantijalt\Type;
use Garantijalt\TypeDetail;

class API
{
    protected $url = "http://lt.garantija.lt/api/v1/";
    protected $token;
    private $debug_mode;

    public function __construct($token = false, $test_mode = false, $api_debug_mode = false)
    {
        if (!$token) {
            throw new GarantijaltException("Garantijalt user Token is required");
        }

        $this->token = $token;

        if (!$test_mode) {
            $this->url = "http://lt.garantija.lt/api/v1/";
        }

        if ($api_debug_mode) {
            $this->debug_mode = $api_debug_mode;
        }
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
    
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }


    private function callAPI($url, $data = [], $method = 'GET')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . $this->token
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($data) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if (strtoupper($method) === 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($this->debug_mode) {
            echo '<b>Token:</b><br><br>';
            echo $this->token;
            echo '<br><br>';
            echo '<b>Endpoint:</b><br><br>';
            echo $url;
            echo '<br><br>';
            echo '<b>Data passed:</b><br><br>';
            echo  json_encode($data, JSON_PRETTY_PRINT);
            echo '<br><br>';
            echo '<b>Data returned:</b><br><br>';
//            echo json_encode($response, JSON_PRETTY_PRINT);
            echo $response;
            echo '<br><br>';
            echo '<b>Default API lib response:</b><br><br>';
        }

        return $this->handleApiResponse($response, $httpCode);
    }

    private function handleApiResponse($response, $httpCode)
    {
        if ($httpCode == 200) {
            return json_decode($response);
        }

//        if ($httpCode == 401) {
//            throw new GarantijaltException(implode(" \n", json_decode($response)->errors));
//        }

        if ($httpCode == 422) {
            $decoded_response = json_decode($response);
            if (isset($decoded_response->message)) {
              throw new ValidationException(debug_backtrace()[2]['function'] . '():<br><br>' . $decoded_response->message);
            }
            else {
              $errMsg = '';
              foreach ($decoded_response as $item) {
                if ($item->message === 'This field is missing.') {
                  $errMsg .= $item->item.' field is missing';
                  $errMsg .= PHP_EOL;
                  if($this->debug_mode) $errMsg .= '<br />';
                }
              }
            }

            throw new GarantijaltException($errMsg);
        }

//        $errors = json_decode($response, true);


//        if (isset($errors['error'])) {
//            //echo 'errors:<br><br>';
//            //echo $response;
//            echo debug_backtrace()[2]['function'];
//            throw new ValidationException(debug_backtrace()[2]['function'] . '():<br><br>' . $errors['error']);
//        }

        throw new GarantijaltException('API responded with error: ' . $response);
    }


    public function getContracts($date_from, $date_to)
    {
        $contracts = [];
        $response = $this->callAPI($this->url . 'contracts?date_gte='.$date_from.'&date_lte='.$date_to);
        foreach ($response as $data){
            $contracts[] = new Contract((array)$data);
        }
        return $contracts;
    }

    public function getContract($id)
    {
        $response = $this->callAPI($this->url . 'contracts/'.$id);

        return new Contract((array)$response);
    }

    public function createContract($contract)
    {
        $post_data = $contract->__toArray();
        $response = $this->callAPI($this->url . 'contracts', $post_data);

        return new Contract((array)$response);
    }

    public function updateContract($contract, $id)
    {
      $post_data = $contract->__toArray();
      $response = $this->callAPI($this->url . 'contracts/'.$id, $post_data, 'PUT');

      return new Contract((array)$response);
    }


    public function getWarrantyTypes()
    {
        $types = [];
        $response = $this->callAPI($this->url . 'warranty_types');
        foreach ($response as $data){
            $types[] = new Type((array)$data);
        }
        return $types;
    }

    public function getWarrantyDetails($id)
    {
        $details = [];
        $response = $this->callAPI($this->url . 'warranty_types/'.$id);
        foreach ($response as $data){
            $details[] = new TypeDetail((array)$data);
        }
        return $details;
    }

    public function getInsuranceTypes()
    {
        $types = [];
        $response = $this->callAPI($this->url . 'insurrance_types');
        foreach ($response as $data){
            $types[] = new Type((array)$data);
        }
        return $types;
    }
    
    public function getInsuranceDetails($id)
    {
        $details = [];
        $response = $this->callAPI($this->url . 'insurrance_types/'.$id);
        foreach ($response as $data){
            $details[] = new TypeDetail((array)$data);
        }
        return $details;
    }

}
