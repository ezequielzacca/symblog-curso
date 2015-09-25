<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Consulta;
use AppBundle\Form\ConsultaType;

class PageController extends Controller
{
    
    
    /**
     * 
     * @Route("/contacto",name="contacto")     * 
     * @Template()
     */
    public function contactoAction(){
        
        $request = $this->getRequest();
        $consulta = new Consulta();
        $form = $this->createForm(new ConsultaType(),$consulta);
        
        if($request->getMethod()=="POST"){
            $form->handleRequest($request);
            if($form->isValid()){  
            $message = \Swift_Message::newInstance()
                    ->setSubject($consulta->getAsunto())
                    ->setFrom($consulta->getEmail())
                    ->setTo('cursosymblog@gmail.com')
                    ->setBody(
                            $this->renderView('AppBundle:Page:emailContacto.txt.twig'
                                    ,array('consulta'=>$consulta))
                            );
            $this->get('mailer')->send($message);
            $this->addFlash('exito', 'Su consulta fue recibida. Muchas Gracias!');
            return $this->redirect($this->generateUrl('contacto'));
            }
        }
        return array('formulario'=>$form->createView());
    }
    
    /**
     * @Route("/acerca",name="acerca_de")
     * @Method("GET")
     * @Template()
     */
    public function acercaDeAction(){
        return array();
    }
    
    /**
     * @Route("/",name="index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(){
        return $this->render('AppBundle:Page:index.html.twig',array());
    }
    
    
}
