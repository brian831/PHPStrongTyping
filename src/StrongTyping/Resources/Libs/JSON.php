<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\String;

class JSON extends String{
    
    protected $decodedValue;

    public function setValue($value){
        if($this->isJsonFormat($value)){
            $this->value = (string) $value;
            $this->decodedValue = json_decode($value);
        } else {
            $this->value = json_encode($value);
            $this->decodedValue = $value;
        }
    }
    
    public function getDecodedValue(){
        return $this->decodedValue;
    }
    
    protected function isJsonFormat($value) {
        json_decode((string) $value);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}