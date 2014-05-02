<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\Source\Location\IPAddress;
use StrongTyping\Resources\Libs\Source\Location\Location;
use StrongTyping\Resources\Libs\JSON;
use StrongTyping\Resources\Libs\Source\Connection\CURLConnection;
use StrongTyping\Resources\Libs\Source\Connection\BasicConnection;

class CodeHelperIPInterpreter implements IPInterpreterInterface{
    
    public function getLocationByIP(IPAddress $IPAddress){
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
        $url        = 'http://api.codehelper.io/ips/';
        $parameters = array('php'=>'','ip'=>$IPAddress->getValue());
        
        if(CURLConnection::_is_enabled()){
            $webConnection = new CURLConnection($url, CURLConnection::METHOD_GET, $parameters);
        } else {
            $webConnection = new BasicConnection($url, BasicConnection::METHOD_GET, $parameters);
        }
        
        $response   = new JSON($webConnection->connect(),true);
        
        return $response->getDecodedValue();
    }

}

?>
