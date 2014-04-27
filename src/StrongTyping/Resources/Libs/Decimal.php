<?php

namespace StrongTyping\Resources\Libs;

use StrongTyping\Resources\Libs\Number;

class Decimal extends Number{
    
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

    public function __toString() {
        return (string) $this->getFormattedValue();
    }
    
    /*
     * @deprecated
     */
    public function convertToString(){
        return $this->convert(Source\Conversion\ConversionFormats::STRING_FORMAT);
    }

}