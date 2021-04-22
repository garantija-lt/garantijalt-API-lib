<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;
use Garantijalt\Customer;
use Garantijalt\Product;
use Garantijalt\ContractType;
use Garantijalt\ContractStatus;
use Garantijalt\Document;

/**
 *
 */
class Contract extends BaseModel
{
    protected $number;
    protected $contract_type_id;
    protected $duration;
    protected $branch;
    protected $created_at;
    protected $sell_date;
    protected $valid_from;
    protected $valid_to;
    protected $price;
    protected $product;
    protected $customer;
    protected $contract_type;
    protected $status;
    protected $documents;
    
    protected $required = ['contract_type_id', 'duration', 'branch', 'sell_date', 'valid_from', 'price', 'product', 'customer'];

    public function __construct($data = [])
    {   
        foreach ($data as $field => $value){
            if (property_exists($this,$field)){
                if ($field == "customer"){
                    $this->{$field} = new Customer((array)$value);
                    continue;
                }
                if ($field == "product"){
                    $this->{$field} = new Product((array)$value);
                    continue;
                }
                if ($field == "contract_type"){
                    $this->{$field} = new ContractType((array)$value);
                    continue;
                }
                if ($field == "status"){
                    $this->{$field} = new ContractStatus((array)$value);
                    continue;
                }
                if ($field == "documents"){
                    if (is_array($value)){
                        $this->{$field} = [];
                        foreach ($value as $doc_data){
                            $this->{$field}[] = new Document((array)$doc_data);
                        }
                    }
                    continue;
                }
                $this->{$field} = $value;
            }
        }
    }
    
    public function getNumber()
    {
        return $this->number;
    }

    public function setContractTypeId($contract_type_id)
    {
        $this->contract_type_id = $contract_type_id;

        return $this;
    }
    
    public function getContractType()
    {
        return $this->contract_type;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
    
    public function getDuration()
    {
        return $this->duration;
    }

    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }
    
    public function getBranch()
    {
        return $this->branch;
    }

    public function setSellDate($sell_date)
    {
        $this->sell_date = $sell_date;

        return $this;
    }
    
    public function getSellDate($sell_date)
    {
        return $this->sell_date;
    }

    public function setValidFrom($valid_from)
    {
        $this->valid_from = $valid_from;

        return $this;
    }
    
    public function getValidFrom()
    {
        return $this->valid_from;
    }
    
    public function setValidTo($valid_to)
    {
        $this->valid_to = $valid_to;

        return $this;
    }
    
    public function getValidTo()
    {
        return $this->valid_to;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
    
    public function getPrice()
    {
        return $this->price;
    }

    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }
    
    public function getProduct()
    {
        return $this->product;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }
    
    public function getCustomer()
    {
        return $this->customer;
    }
    
    public function getDocuments()
    {
        return $this->documents;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
}
