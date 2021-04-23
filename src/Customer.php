<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;
/**
 *
 */
class Customer extends BaseModel
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
    
    protected $required = ['firstname', 'lastname', 'code', 'address', 'address_2', 'zip', 'city', 'country', 'phone', 'email'];
    protected $nullable = ['address', 'address_2', 'zip', 'city', 'country'];
    

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

}
