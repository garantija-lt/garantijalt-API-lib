<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;

/**
 *
 */
class Customer
{
    protected $firstname;
    protected $lastname;
    protected $code;
    protected $address;
    protected $address_2;
    protected $zip;
    protected $city;
    protected $country;
    protected $phone;
    protected $email;

    public function __construct()
    {
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function setAddress1($address)
    {
        $this->address = $address;

        return $this;
    }

    public function setAddress2($address_2)
    {
        $this->address_2 = $address_2;

        return $this;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

  public function generateCustomer()
  {
    if (!$this->firstname) throw new GarantijaltException('All the required fields must be filled. firstname is missing.');
    if (!$this->lastname) throw new GarantijaltException('All the required fields must be filled. lastname is missing.');
    if (!$this->code) throw new GarantijaltException('All the required fields must be filled. code is missing.');
//    if (!$this->address || !$this->address_2) throw new GarantijaltException('At least one address must be filled.');
//    if (!$this->zip) throw new GarantijaltException('All the fields must be filled. zip code is missing.');
//    if (!$this->city) throw new GarantijaltException('All the fields must be filled. city is missing.');
//    if (!$this->country) throw new GarantijaltException('All the fields must be filled. country is missing.');
    if (!$this->phone) throw new GarantijaltException('All the required fields must be filled. phone is missing.');
    if (!$this->email) throw new GarantijaltException('All the required fields must be filled. email is missing.');

    $customer = array(
      'firstname' => $this->firstname,
      'lastname' => $this->lastname,
      'code' => $this->code,
      'address' => $this->address,
      'address_2' => $this->address_2,
      'zip' => $this->zip,
      'city' => $this->city,
      'country' => $this->country,
      'phone' => $this->phone,
      'email' => $this->email
    );

    return $customer;
  }

  public function returnJson()
  {
    return json_encode($this->generateCustomer());
  }

  public function __toArray()
  {
    return $this->generateCustomer();
  }

}
