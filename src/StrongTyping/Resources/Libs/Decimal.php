<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\StrongType;
use StrongTyping\Resources\Libs\Convertible;
use StrongTyping\Resources\Libs\String;

class Decimal implements StrongType, Convertible{
    
    protected $value;
    
    protected $decimalSeparator     = ',';
    protected $thousandsSeparator   = '';
    protected $precision;
    
    public function __construct($value, $precision = 2){
        $this->setValue($value);
        $this->setPrecision($precision);
    }
    
    protected function setValue($value){
        $this->value = (float) $value;
    }
    
    public function getValue(){
        return $this->value;
    }
    
    public function getFormattedValue(){
        return number_format($this->value, $this->precision, $this->decimalSeparator, $this->thousandsSeparator);
    }
    
    public function setPrecision($precision){
        $this->precision = (int) $precision;
    }
    
    public function setSeparators($decimalSeparator,$thousandsSeparator){
        $this->decimalSeparator     = $decimalSeparator;
        $this->thousandsSeparator   = $thousandsSeparator;
    }

    public function convertToString() {
        return new String($this->getFormattedValue());
    }
    
}