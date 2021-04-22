<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class ContractType extends BaseModel
{
    protected $key;
    protected $title;
    
    public function getKey()
    {
        return $this->key;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

}
