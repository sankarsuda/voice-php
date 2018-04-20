<?php
/**
 * 
 */

namespace Mobtexting\DialPlan;

abstract class DialPlan{
    private $name;
    private $attributes;
    private $next;

    /**
     * DialPlan Constructor
     * 
     * @param string $name Dial Plan Element Name
     * @param array $attributes Attributes of The Dial Plan Element Attributes
     */

     public function __construct($name, $attributes=NULL){
        $this->name = $name;
        if ($attributes) {
            $this->attributes[] = $attributes;
        }
        $this->next = array();
     }

     /**
      * 
      */
     public function setAttribute($name, $value){
        $required_attribute = array_filter($this->attributes, function($attribute){
            return $attribute->name === 'name';
        });

        $required_attribute->setValue($value);
     }
     /**
      * Add a Dial Plan Element
      * 
      * @param DialPlan $dialplan Dial Plan to Append
      * @return $this
      */

      public function append($dialplan){
          $this->next[] = $dialplan;
          return $this;
      }

      /**
       * Convert Dial Plan to json
       * 
       * @return string DialPlan json representation
       */

       public function toJson(){
           return $this->_toString();
       }


       /**
        * Convert Dial Plan to String
        * 
        * @return string DialPlan json representation
        */

        public function _toString(){
            $element = $this->toArray();
            return json_encode($element);
        }


        /**
        * Convert Dial Plan to An PHP Array
        * 
        * @return Array DialPlan Array representation
        */

        public function toArray(){
            $element = array();
            $attributes= array();
            $result = array();
            foreach($this->attributes as $attribute){
                $attributes = array_merge($attribute->toArray(), $attributes);
            }
            $element[$this->name] = $attributes;
            if(count($this->next)>0){
                $result[] = $element;
                foreach($this->next as $basic_element){
                    $result[] = $basic_element->toArray();
                }
                return $result;
            }else{
                return $element;
            }
            
        }
} 