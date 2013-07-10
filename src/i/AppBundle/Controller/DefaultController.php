<?php

namespace i\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('iAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
