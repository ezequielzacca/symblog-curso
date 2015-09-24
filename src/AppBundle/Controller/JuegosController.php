<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class JuegosController extends Controller {

    /**
     * @Route("/",name="app_juegos_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        return array();
        
    }

    
    
    /**
     * 
     * @Route("/devuelve/fecha",name="devuelve_fecha")
     */
    public function fechaAction() {
        $fecha = new \DateTime();
        return new Response($fecha->format('d-m-Y'));
    }
    
    
    
    /**
     * 
     * @Route("/dado/{cantidad}",name="app_juegos_dados", requirements = {
     *                                                                     "cantidad": "\d+" })
     * @Template()
     */
    public function dadosAction($cantidad) {
        for($i=1; $i<=$cantidad; $i++){
            $numeros[$i]=rand(1,6);
        }
        
        return array('resultados' => $numeros)
        ;
    }

    
    
}
