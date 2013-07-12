<?php

namespace i\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

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
        $response = new Response();        
        $response->headers->set('Content-Type', 'application/json');
        
        if (!$this->getRequest()->cookies->get(md5($id))) {
            $man = $this->getDoctrine()->getManager();            
            $repo = $man->getRepository('iAppBundle:Pic');
            
            $pic = $repo->findOneById($id);            
            if ($pic instanceof \i\AppBundle\Entity\Pic) {
                $pic->setLikes($pic->getLikes() + 1);
                $man->persist($pic);
                $man->flush();
                
                $response->setContent(json_encode(array('msg' => 'success', 'likes' => $pic->getLikes())));
                $response->setStatusCode(200);
                
                $cookie = new Cookie(md5($id), true, time() + 60 * 60 * 24 * 365, '/', '.inst4face.com', false, false);      
                $response->headers->setCookie($cookie);
                
                $out = array();
                $message = \Swift_Message::newInstance()
                        ->setSubject('Someone loves your pic!')
                        ->setFrom('yay@inst4face.com')
                        ->setTo($pic->getLogin()->getEmail())
                        ->setBody($this->renderView('iAppBundle:Default:email_like.html.twig', $out), 'text/html')
                        ->addPart($this->renderView('iAppBundle:Default:email_like.txt.twig', $out), 'text/plain');

                $this->get('mailer')->send($message);
                
            } else {
                $response->setContent(json_encode(array('msg' => 'no such pic')));
                $response->setStatusCode(500);                
            }            
        } else {
            $response->setContent(json_encode(array('msg' => 'you already like this')));
            $response->setStatusCode(500);            
        }
        
        return $response;
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
