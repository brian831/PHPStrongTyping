<?php

namespace StrongTyping\Resources\Libs\Source\Localization;

use StrongTyping\Resources\Libs\Source\Localization\IPAddress;
use StrongTyping\Resources\Libs\JSON;

class CodeHelperIPInterpreter implements IPInterpreterInterface{
    
    protected $IPAddress;
    protected $data = array();
    
    public function __construct(IPAddress $IPAddress) {
        $this->setIPAddress($IPAddress);
    }
    
    public function setIPAddress(IPAddress $IPAddress) {
        $this->IPAddress = $IPAddress;
        $this->search();
    }   

    public function getCountryCode() {
        return $this->data->Country;
    }

    public function getCountryName() {
        return $this->data->CountryName;
    }
    
    public function getCityName() {
        return $this->data->CityName;
    }

    public function getLocalTimeZone() {
        return $this->data->LocalTimeZone;
    }

    public function getLatitude() {
        return $this->data->CityLatitude;
    }

    public function getLongitude() {
        return $this->data->CityLongitude;
    }

    protected function search(){
        $url        = 'http://api.codehelper.io/ips/?php&ip=' . $this->IPAddress->getValue();
        $response   = new JSON(file_get_contents($url),true);
        $this->data = $response->getDecodedValue();
    }
}

?>
