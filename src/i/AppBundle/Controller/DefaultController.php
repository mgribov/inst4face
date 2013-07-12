<?php

namespace i\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller {
    
    /** 
     * @Route("/login", name="login")
     */    
    public function loginAction() {
        return $this->render('iAppBundle:Default:login.html.twig');
    }

    /** 
     * @Route("/upload", name="upload")
     * @Secure(roles="ROLE_USER")
     */    
    public function uploadAction() {
        return $this->render('iAppBundle:Default:upload.html.twig');
    }

    /** 
     * @Route("/pic/{id}/like", name="like")
     */    
    public function likeAction($id) {
 
    }

    /** 
     * @Route("/{page}", name="index", defaults={"page" = 1}, requirements={"page" = "\d+"})
     */                
    public function indexAction($page = 1) {
        return $this->render('iAppBundle:Default:index.html.twig');
    }
    
}
