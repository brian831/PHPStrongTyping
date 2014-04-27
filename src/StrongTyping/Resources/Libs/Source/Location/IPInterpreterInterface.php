<?php

namespace StrongTyping\Resources\Libs\Source\Location;

use StrongTyping\Resources\Libs\Source\Location\IPAddress;

interface IPInterpreterInterface {
    
    /*
     * Returns StrongTyping\Resources\Libs\Source\Location\Location
     */
    public function getLocation(IPAddress $IPAddress);
    
}

?>
