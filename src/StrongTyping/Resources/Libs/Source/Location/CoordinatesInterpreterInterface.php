<?php

namespace StrongTyping\Resources\Libs\Source\Location;

interface CoordinatesInterpreterInterface {
    
    public function getLocationByCoordinates($latitude,$longitude);
    
}

?>
