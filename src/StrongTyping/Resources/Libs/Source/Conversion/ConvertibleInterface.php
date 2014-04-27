<?php

namespace StrongTyping\Resources\Libs\Source\Conversion;

interface ConvertibleInterface {
    
    public function convert($format);
    
    public function getSupportedConversions();
}
