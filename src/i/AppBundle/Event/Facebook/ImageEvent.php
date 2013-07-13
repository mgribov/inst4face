<?php
namespace i\AppBundle\Event\Facebook;

use i\AppBundle\Model\Facebook\Feed;

class ImageEvent extends PostEvent {
    protected $facebook_call = '/me/feed';
    
    public function getMessage() {
        return array(
            'message' => $this->entity->getLogin()->getName() . ' uploaded a pic!',
            'link' => $this->entity->getUrl(),
        );
    }
        
}