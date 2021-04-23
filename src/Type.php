<?php

namespace Garantijalt;

use Garantijalt\Exception\GarantijaltException;
use Garantijalt\BaseModel;

/**
 *
 */
class Type extends BaseModel
{
    protected $id;
    protected $title;
    protected $logo_url;

    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getLogoUrl()
    {
        return $this->logo_url;
    }

}
