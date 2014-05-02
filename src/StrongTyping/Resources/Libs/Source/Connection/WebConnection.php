<?php

namespace StrongTyping\Resources\Libs\Source\Connection;

abstract class WebConnection {
    
    const METHOD_GET      = 'GET';
    const METHOD_POST     = 'POST';
    const METHOD_PUT      = 'PUT';
    const METHOD_DELETE   = 'DELETE';
    
    protected $method;
    protected $parameters;
    protected $url;
    protected $headers;
    
    abstract public function connect();
    
    public function __construct($url, $method = self::METHOD_GET, Array $parameters = array()) {
        $this->setUrl($url);
        $this->setMethod($method);
        $this->setParameters($parameters);
    }
    
    public function setMethod($method){
        $this->method = $method;
    }
    
    public function getMethod(){
        return $this->method;
    }
    
    public function setParameters(Array $parameters){
        $this->parameters = $parameters;
    }
    
    public function getParameters($_as_string = false) {
        if($_as_string){
            return http_build_query($this->parameters);
        }
        return http_build_query($this->parameters);
    }
    
    public function setUrl($url){
        $this->url = $url;
    }
    
    public function getUrl(){
        return $this->url;
    }
    public function setHeaders(Array $headers){
        $this->headers = $headers;
    }
    
    public function getHeaders(){
        return $this->headers;
    }
    
    public function addHeader($value, $key = null){
        if(!$this->headers) $this->headers = array();
        
        $this->headers[$key] = $value;
    }
    
}

?>
