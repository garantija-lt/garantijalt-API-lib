<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class ContractStatus extends BaseModel
{
    protected $identifier;
    protected $title;
    
    public function getIdentifier()
    {
        return $this->identifier;
    }

    
    public function getTitle()
    {
        return $this->title;
    }

}
