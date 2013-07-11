<?php

namespace i\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller {
    
    /** 
     * @Route("/login", name="login")
     * @Template()
     */    
    public function loginAction() {
        return $this->render('iAppBundle:Default:login.html.twig');
    }

    /** 
     * @Route("/upload", name="upload")
     * @Template()
     * @Secure(roles="ROLE_USER")
     */    
    public function uploadAction() {
        return $this->render('iAppBundle:Default:upload.html.twig');
    }

    /** 
     * @Route("/pic/{id}/like", name="like")
     * @Template()
     */    
    public function likeAction($id) {
 
    }

    /** 
     * @Route("/{page}", name="index", defaults={"page" = 1}, requirements={"page" = "\d+"})
     * @Template()
     */                
    public function indexAction($page = 1) {
        return $this->render('iAppBundle:Default:index.html.twig');
    }
    
}
