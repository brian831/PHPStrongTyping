<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\Decimal;

class Location{
    
    const UNIT_KILOMETER = 'K';
    const UNIT_MILE = 'M';

    protected $latitude;
    protected $longitude;
    protected $countryCode;
    protected $countryName;
    protected $cityName;
    protected $localTimeZone;

    public function setCountryCode($countryCode){
        $this->countryCode = $countryCode;
    }
    
    public function getCountryCode() {
        return $this->countryCode;
    }

    public function setCountryName($countryName){
        $this->countryName = $countryName;
    }
    
    public function getCountryName() {
        return $this->countryName;
    }
    
    public function setCityName($cityName){
        $this->cityName = $cityName;
    }
    
    public function getCityName() {
        return $this->cityName;
    }

    public function setLocalTimeZone($localTimeZone){
        $this->localTimeZone = $localTimeZone;
    }
    
    public function getLocalTimeZone() {
        return $this->localTimeZone;
    }

    public function setLatitude($latitude){
        $this->latitude = $latitude;
    }
    
    public function getLatitude() {
        return $this->latitude;
    }

    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    
    public function getLongitude() {
        return $this->longitude;
    }
    
    public function getDistance(Location $otherLocation, $distanceUnit = self::UNIT_MILE){
        $theta = $this->getLatitude() - $otherLocation->getLongitude();
        $dist = sin(deg2rad($this->getLatitude())) * sin(deg2rad($otherLocation->getLatitude())) +  cos(deg2rad($this->getLatitude())) * cos(deg2rad($otherLocation->getLatitude())) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        
        $distance = $dist * 60 * 1.1515;
        if($distanceUnit == self::UNIT_KILOMETER) $distance = $distance * 1.609344;

        $result = new Decimal($distance);
        return $result;
    }
    
}

?>
