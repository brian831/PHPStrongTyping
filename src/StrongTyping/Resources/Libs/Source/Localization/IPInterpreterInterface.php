<?php

namespace StrongTyping\Resources\Libs\Source\Localization;

use StrongTyping\Resources\Libs\Source\Localization\IPAddress;

interface IPInterpreterInterface {
    
    public function __construct(IPAddress $IPAddress);
    
    public function setIPAddress(IPAddress $IPAdress);
    
    public function getLatitude();
    public function getLongitude();
    
    public function getCountryCode();
    public function getCountryName();
    public function getCityName();
    
    public function getLocalTimeZone();
    
}

?>
