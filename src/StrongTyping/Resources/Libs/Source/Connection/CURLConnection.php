<?php

namespace StrongTyping\Resources\Libs\Source\Connection;

class CURLConnection extends WebConnection {
    
    protected $options;
    
    public function __construct($url, $method = self::METHOD_GET, array $parameters = array()) {
        if(!$this->_is_enabled()) throw new \Exception('Unavailable cURL library');
        parent::__construct($url, $method, $parameters);
    }

    public function connect() {
        $ch = $this->getHandler();
        $this->addParameters($ch);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
    public function addOptions(Array $options){
        $this->options = $options;
    }
    
    public function getParameters($_as_string = false) {
        if($_as_string){
            return http_build_query(parent::getParameters());
        }
        return parent::getParameters();
    }
    
    protected function addParameters($ch){
        if($this->method == self::METHOD_POST){
            curl_setopt($ch,CURLOPT_POST, count($this->getParameters()));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $this->getParameters(true));
        }
    }
    
    protected function getHandler(){
        $ch = curl_init($this->getUrl());
        
        curl_setopt($ch,CURLOPT_URL, $this->getUrl());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->getMethod());
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if($this->getHeaders()){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders());
        }
        
        if($this->options){
            curl_setopt_array($ch, $this->options);
        }
        
        return $ch;
    }
    
    protected function _is_enabled(){
        return function_exists('curl_version');
    }
}

?>
