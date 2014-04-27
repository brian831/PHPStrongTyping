<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\String;

class IPAddress extends String{

    public function setValue($value) {
        if(!$this->isValidIP($value)) throw new \Exception('Not valid IP Address');
        parent::setValue($value);
    }
    
    protected function isValidIP($value){
        $value = (string) $value;
        return (filter_var($value, FILTER_VALIDATE_IP));
    }
    
}

?>
