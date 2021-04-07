<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;

/**
 *
 */
class Contract
{
    protected $contract_type_id;
    protected $duration;
    protected $branch;
    protected $sell_date;
    protected $valid_from;
    protected $price;
    protected $product;
    protected $customer;

    public function __construct()
    {
    }

    public function setContractTypeId($contract_type_id)
    {
        $this->contract_type_id = $contract_type_id;

        return $this;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }

    public function setSellDate($sell_date)
    {
        $this->sell_date = $sell_date;

        return $this;
    }

    public function setValidFrom($valid_from)
    {
        $this->valid_from = $valid_from;

        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

  public function generateContract()
  {
    if (!$this->contract_type_id) throw new GarantijaltException('All the required fields must be filled. contract_type_id is missing.');
    if (!$this->duration) throw new GarantijaltException('All the required fields must be filled. duration is missing.');
    if (!$this->branch) throw new GarantijaltException('All the required fields must be filled. branch is missing.');
    if (!$this->sell_date) GarantijaltException('All the required fields must be filled. sell_date is missing.');
    if (!$this->valid_from) throw new GarantijaltException('All the fields must be filled. valid_from is missing.');
    if (!$this->price) throw new GarantijaltException('All the fields must be filled. price is missing.');
    if (!$this->product) throw new GarantijaltException('All the fields must be filled. product is missing.');
    if (!$this->customer) throw new GarantijaltException('All the required fields must be filled. customer is missing.');

    $contract = array(
      'contract_type_id' => $this->contract_type_id,
      'duration' => $this->duration,
      'branch' => $this->branch,
      'sell_date' => $this->sell_date,
      'valid_from' => $this->valid_from,
      'price' => $this->price,
      'product' => $this->product,
      'customer' => $this->customer
    );

    return $contract;
  }

  public function returnJson()
  {
    return json_encode($this->generateContract());
  }

  public function __toArray()
  {
    return $this->generateContract();
  }

}
