<?php

namespace i\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {
    
    /** 
     * @Route("/login", name="login")
     */    
    public function loginAction() {
        $out = array();
        
        $request = $this->getRequest();
        $session = $this->get('session');
        
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $out['error'] = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $out['error'] = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('iAppBundle:Default:login.html.twig', $out);
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
        $out = array(
            'images' => $this->getDoctrine()
                ->getManager()
                ->getRepository('iAppBundle:Pic')
                ->getAll($page),
        );
        
        return $this->render('iAppBundle:Default:index.html.twig', $out);
    }
    
}
