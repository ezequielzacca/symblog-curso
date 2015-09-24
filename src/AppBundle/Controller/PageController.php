<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PageController extends Controller
{
    
    /**
     * @Route("/",name="index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(){
        return $this->render('AppBundle:Page:index.html.twig',array());
    }
    
    
}
