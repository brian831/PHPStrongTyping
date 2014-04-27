<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\Source\StrongType;

class String implements StrongType{
    
    protected $value;
    
    public function __construct($value){
        $this->setValue($value);
    }
    
    public function getValue() {
        return $this->value;
    }
    
    public function setValue($value){
        $this->value = (string) $value;
    }
    
    public function __toString() {
        return $this->getValue();
    }
    
    public function replace($search,$replace,$caseSensitive = true){
        $value = $this->getValue();
        if($caseSensitive){
            $value = str_replace($search, $replace, $value);
        } else {
            $value = str_ireplace($search, $replace, $value);
        }
        
        $this->setValue($value);
    }
    
    public function contains($search){
        return (strpos($this->getValue(), $search) !== false);
    }
    
    public function getLength(){
        return strlen($this->getValue());
    }
}