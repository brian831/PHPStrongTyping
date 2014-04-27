<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\Source\Location\IPAddress;

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
