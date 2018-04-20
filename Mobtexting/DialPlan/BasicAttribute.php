<?php

/**
 * 
 */

namespace Mobtexting\DialPlan;

class BasicAttribute{
    private $name;
    private $value;
    private $type;
    public function __construct($name, $value, $type="string"){
    $this->name = $name;
    $this->value = $value;
    $this->type = $type;
    }

    public function setValue($value){
        if(gettype($value) === $this->type){
            $this->value = $value;
        }else{
        
        }
    }


    public function toArray(){
        $result = array();
        switch($this->type){
            case 'string':
            $result[$this->name] = $this->value;
            break;
            case 'integer':
            $result[$this->name] = $this->value;
            break;
            case 'object':
            $result[$this->name] = $this->value.toArray();
            break;
        }
        return $result;
    }
}