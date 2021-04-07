<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;

/**
 *
 */
class Product
{
    private $title;
    private $category;
    private $manufacturer;
    private $warranty;
    private $price;
    private $serial_number;

    public function __construct()
    {

    }

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

    public function generateProduct()
    {
        if (!$this->title) throw new GarantijaltException('All the fields must be filled. title is missing.');
        if (!$this->category) throw new GarantijaltException('All the fields must be filled. category is missing.');
        if (!$this->manufacturer) throw new GarantijaltException('All the fields must be filled. manufacturer is missing.');
        if (!$this->warranty) throw new GarantijaltException('All the fields must be filled. warranty is missing.');
        if (!$this->price) throw new GarantijaltException('All the fields must be filled. price is missing.');
        if (!$this->serial_number) throw new GarantijaltException('All the fields must be filled. serial_number is missing.');

        $product = array(
            'title' => $this->title,
            'category' => $this->category,
            'manufacturer' => $this->manufacturer,
            'warranty' => $this->warranty,
            'price' => $this->price,
            'serial_number' => $this->serial_number
        );

        return $product;
    }


    public function returnJson()
    {
        return json_encode($this->generateProduct());
    }

    public function __toArray()
    {
        return $this->generateProduct();
    }
}
