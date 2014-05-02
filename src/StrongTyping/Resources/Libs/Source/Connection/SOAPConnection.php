<?php

namespace StrongTyping\Resources\Libs\Source\Connection;

class SOAPConnection extends WebConnection {
    
    protected $client;
    protected $wss_ns = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
    protected $options = array(
                'exceptions' => true,
                'trace' => 1,
                'wdsl_local_copy' => true
            );
    
    public function __construct($wsdl, $method = self::METHOD_GET, array $parameters = array()) {
        $this->setClient($wsdl);
        parent::__construct($wsdl, $method, $parameters);
    }
    
    public function connect() {
        $this->client->__setSoapHeaders($this->getHeaders());
        $response = $this->client->__soapCall($this->method, $this->parameters);
        return $response;
    }
    
    public function setOptions(Array $options){
        $this->options = $options;
    }
    
    public function setAuthHeader($username,$password,$wss_ns){
        if ($wss_ns) {
            $this->wss_ns = $wss_ns;
        }
        
        $auth = new \stdClass();
        $auth->Username = new \SoapVar($username, XSD_STRING, NULL, $this->wss_ns,NULL, $this->wss_ns);
        $auth->Password = new \SoapVar($password, XSD_STRING, NULL, $this->wss_ns,NULL, $this->wss_ns);
        $username_token = new \stdClass();
        $username_token->UsernameToken = new \SoapVar($auth,SOAP_ENC_OBJECT, NULL, $this->wss_ns, 'UsernameToken', $this->wss_ns);
        $security_sv = new \SoapVar(new \SoapVar($username_token, SOAP_ENC_OBJECT, NULL, $this->wss_ns, 'UsernameToken', $this->wss_ns),SOAP_ENC_OBJECT, NULL, $this->wss_ns, 'Security', $this->wss_ns);
        
        $header = new \SoapHeader($this->wss_ns, 'Security', $security_sv, true);
        
        $this->addHeader($header);
    }
    
    protected function setClient($wsdl){
        $this->client = new \SoapClient($wsdl, $this->options);
    }
}

?>
