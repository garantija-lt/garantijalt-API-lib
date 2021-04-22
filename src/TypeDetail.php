<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class TypeDetail extends BaseModel
{
    protected $id;
    protected $title;
    protected $period;
    protected $surcharge;
    protected $logo_url;

    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getPeriod()
    {
        return $this->period;
    }
    
    public function getSurcharge()
    {
        return $this->surcharge;
    }
    
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

}
