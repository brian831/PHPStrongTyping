<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\Source\StrongType;
use StrongTyping\Resources\Libs\Number;

class Integer extends Number implements StrongType{
    
    protected $value;

    public function __construct($value) {
        $this->setValue($value);
    }
    
    public function getValue() {
        return $this->value;
    }
    
    public function setValue($value){
        $this->value = (int) $value;
    }

    public function __toString() {
        return (string) $this->getValue();
    }


}

?>
