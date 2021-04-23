<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;

/**
 *
 */
class BaseModel
{
    
    protected $required = [];
    protected $nullable = [];
    
    public function __construct($data = [])
    {
        foreach ($data as $field => $value){
            if (property_exists($this,$field)){
                $this->{$field} = $value;
            }
        }
    }
    
    private function validate(){
        if (isset($this->required)){
            foreach ((array)$this->required as $field){
                if (property_exists($this,$field) && !isset($this->{$field})){
                    if (!in_array($field, $this->nullable)){
                        throw new GarantijaltException('All the required fields must be filled. '.get_called_class().'.'.$field.' is missing.');
                    }
                }
            }
        }
    }

    public function generate()
    {
        $this->validate();

        $data = [];
        foreach ((array)$this->required as $field){
            if (property_exists($this,$field)){
                if (is_object($this->{$field})){
                    $data[$field] = $this->{$field}->__toArray();
                } else {
                    $data[$field] = $this->{$field};
                }
            }
        }

        return $data;
    }

    public function returnJson()
    {
        return json_encode($this->generate());
    }

    public function __toArray()
    {
        return $this->generate();
    }

}
