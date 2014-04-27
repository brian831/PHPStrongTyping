<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\Source\Location\IPAddress;
use StrongTyping\Resources\Libs\Source\Location\Location;
use StrongTyping\Resources\Libs\JSON;

class CodeHelperIPInterpreter implements IPInterpreterInterface{
    
    public function getLocation(IPAddress $IPAddress){
        $data = $this->getData($IPAddress);
        
        $location = new Location();
        $location->setLatitude($data->CityLatitude);
        $location->setLongitude($data->CityLongitude);
        $location->setCountryCode($data->Country);
        $location->setCountryName($data->CountryName);
        $location->setCityName($data->CityName);
        $location->setLocalTimeZone($data->LocalTimeZone);
        
        return $location;
    }
    
    protected function getData(IPAddress $IPAddress){
        $url        = 'http://api.codehelper.io/ips/?php&ip=' . $IPAddress->getValue();
        $response   = new JSON(file_get_contents($url),true);
        
        return $response->getDecodedValue();
    }

}

?>
