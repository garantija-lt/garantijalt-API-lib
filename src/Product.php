<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class Product extends BaseModel
{
    protected $title;
    protected $category;
    protected $manufacturer;
    protected $warranty;
    protected $price;
    protected $serial_number;
    
    protected $required = ['title', 'category', 'manufacturer', 'warranty', 'price', 'serial_number'];

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;

        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function setSerialNumber($serial_number)
    {
        $this->serial_number = $serial_number;

        return $this;
    }
}
