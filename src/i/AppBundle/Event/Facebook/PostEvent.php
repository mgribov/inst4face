<?php

namespace i\AppBundle\Event\Facebook;

use Symfony\Component\EventDispatcher\Event;

abstract class PostEvent extends Event {
    
    protected $facebook;   
    protected $facebook_call;
    protected $facebook_method = 'GET';
    
    protected $entity;
    protected $login;    
    protected $gearman;
    
    public function setGearman(\i\AppBundle\Services\iGearman $gearman) {
        $this->gearman = $gearman;
    }
    
    public function setFacebook(\i\AppBundle\Services\iFacebook $facebook) {
        $this->facebook = $facebook;
    }

    public function setLogin(\i\AppBundle\Entity\Login $login) {
        $this->login = $login;
    }

    public function getFacebook() {
        return $this->facebook;
    }
    
    public function setEntity($entity) {
        $this->entity = $entity;
    }
    
    public function getEntity() {
        return $this->entity;
    }    
    
    public function toMessage() {
        if (!$this->entity) {
            throw new \Exception(__METHOD__ . ': no valid entity');
        }       
        return $this->getMessage();
    }
    
    abstract function getMessage();
    
    public function post() {
        if (!$this->login && is_object($this->entity) && method_exists ($this->entity, 'getLogin')) {
            $this->login = $this->entity->getLogin();
        }
        
       $payload = serialize(array(
            'facebook' => $this->facebook,
            'token' => $this->facebook->getAccessToken(),
            'message' => $this->getMessage(),
            'call' => $this->facebook_call
            ));
        
        if (!$this->gearman->executeBackground('facebook_publish', $payload)) {
            return $this->facebook->publish($this->facebook_call, $this->toMessage());
        }
    }    
}
