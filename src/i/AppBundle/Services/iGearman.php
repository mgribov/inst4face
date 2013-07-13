<?php
namespace i\AppBundle\Services;  
      
class iGearman  {      
    protected $client;
    
    public function __construct($config) {  
        $this->client = new \GearmanClient();
        $this->client->addServer($config['host'], $config['port']);  
    }  
    
    public function getClient() {
        return $this->client;
    }
    
    public function executeBackground($function, $payload) {
        if ($this->client->ping('test')) {            
            $this->client->doLowBackground($function, $payload);
            return true;
        }        
        return false;
    }
}  