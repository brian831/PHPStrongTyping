<?php

namespace StrongTyping\Resources\Libs\Source\Connection;

class BasicConnection extends WebConnection {
    
    public function connect() {
        return file_get_contents($this->getUrl());
    }
    
}

?>
