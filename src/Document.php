<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class Document extends BaseModel
{
    protected $name;
    protected $data;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function save($location = "/", $name = null){
        if (!$name){
            $name = $this->name;
        }
        file_put_contents($location.$name, base64_decode($this->data));
    }

}
