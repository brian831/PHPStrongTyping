<?php

namespace StrongTyping\Resources\Libs\Source\Location;

class RemoteLocationHelper {

    public static function getUserIPAddress() {
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
    
    public static function getUserLocation(IPAddress $IPAddress, $IPInterpreterName = 'StrongTyping\Resources\Libs\Source\Location\CodeHelperIPInterpreter'){
        if(!class_exists($IPInterpreterName)) throw new \Exception('Unknown IP Interpreter');
        $IPInterpreter = new $IPInterpreterName();
        if(!is_a($IPInterpreter, 'StrongTyping\Resources\Libs\Source\Location\IPInterpreterInterface')) throw new \Exception('Incorrect IP Interpreter');
        
        return $IPInterpreter->getLocation($IPAddress);
    }
    
}

?>
