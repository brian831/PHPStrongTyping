<?php

namespace StrongTyping\Resources\Libs\Source\Conversion;

class ConversionFormats {

    const BASE_NAMESPACE = 'StrongTyping\\Resources\\Libs\\';
    
    const STRING_FORMAT = 'string';
    const JSON_FORMAT = 'json';
    
    protected $formats = array(
        self::STRING_FORMAT => 'String',
        self::JSON_FORMAT => 'JSON'
    );
    
    public function getClassName($format){
        $format = (string) $format;
        
        if(!array_key_exists($format, $this->formats)){
            throw new \Exception('Non existent format');
        }
        
        $className = self::BASE_NAMESPACE . $this->formats[$format];
        
        return $className;
    }
    
    public function findFormat($className){
        $className = str_ireplace(self::BASE_NAMESPACE, '', $className);
        return array_search($className, $this->formats);
    }
    
}

?>
