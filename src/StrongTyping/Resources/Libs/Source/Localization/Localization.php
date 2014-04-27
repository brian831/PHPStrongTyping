<?php

namespace StrongTyping\Resources\Libs\Source\Localization;

use StrongTyping\Resources\Libs\Source\Localization\IPAddress;

class Localization{

    protected $IPAddress;
    protected $IPInterpreter;

    public function __construct(IPAddress $forcedIPAddress = null,$IPInterpreterName = 'StrongTyping\Resources\Libs\Source\Localization\CodeHelperIPInterpreter'){
        if(!class_exists($IPInterpreterName)) throw new \Exception('Unknown IP Interpreter');
        
        $this->IPAddress = $forcedIPAddress;
        if(!$this->IPAddress){
            $this->IPAddress = $this->getRealIP();
        }
        
        $IPInterpreter = new $IPInterpreterName($this->IPAddress);
        if(!is_a($IPInterpreter, 'StrongTyping\Resources\Libs\Source\Localization\IPInterpreterInterface')) throw new \Exception('Incorrect IP Interpreter');
        
        $this->IPInterpreter = $IPInterpreter;
    }

    public function getIPAddress() {
        return $this->IPAddress;
    }
    
    public function getCountryCode() {
        return $this->IPInterpreter->getCountryCode();
    }

    public function getCountryName() {
        return $this->IPInterpreter->getCountryName();
    }
    
    public function getCityName() {
        return $this->IPInterpreter->getCityName();
    }

    public function getLocalTimeZone() {
        return $this->IPInterpreter->getLocalTimeZone();
    }

    public function getLatitude() {
        return $this->IPInterpreter->getLatitude();
    }

    public function getLongitude() {
        return $this->IPInterpreter->getLongitude();
    }
 
    public function getRealIP() {
        if(isset($_SERVER['HTTP_CF_CONNECTING_IP']))        $ipString = $_SERVER['HTTP_CF_CONNECTING_IP'];
        else if (isset($_SERVER['HTTP_X_REAL_IP']))         $ipString = $_SERVER['HTTP_X_REAL_IP'];
        else if (isset($_SERVER['HTTP_CLIENT_IP']))         $ipString = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))   $ipString = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))       $ipString = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))      $ipString = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))          $ipString = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))             $ipString = $_SERVER['REMOTE_ADDR'];
        
        else throw new \Exception('Unknown IP Address');

        return new IPAddress($ipString);
    }
    
}

?>
