<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\Source\StrongType;
use StrongTyping\Resources\Libs\Source\Conversion\ConvertibleInterface;
use StrongTyping\Resources\Libs\String;
use StrongTyping\Resources\Libs\Source\Conversion\ConversionFormats;

abstract class Number implements StrongType, ConvertibleInterface{
    
    protected $value;
    
    abstract public function __toString();
    
    public function getValue(){
        return $this->value;
    }
    
    public function distance(self $number){
        return (abs($this->getValue()) - abs($number->getValue()));
    }
    
    public function equals(self $other) {
        return ($this->getValue() == $other->getValue());
    }
    
    public function convert($format) {
        if($format == ConversionFormats::STRING_FORMAT) return new String((string) $this);
        if($format == ConversionFormats::JSON_FORMAT) return new JSON((string) $this);
    }
    
    public function getSupportedConversions() {
        return array(ConversionFormats::STRING_FORMAT,  ConversionFormats::JSON_FORMAT);
    }
    
}