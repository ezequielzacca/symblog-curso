<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    /**
     * 
     * @Route("/prueba")
     */
    public function pruebaAction(){
        return new Response("Prueba Exitosa");
    }
}
