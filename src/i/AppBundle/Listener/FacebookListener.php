<?php

namespace i\AppBundle\Listener;

use i\AppBundle\Event\Facebook\PostEvent;

class FacebookListener {
    
    public function onEvent(PostEvent $event) {
        return $event->post();
    }
    
}