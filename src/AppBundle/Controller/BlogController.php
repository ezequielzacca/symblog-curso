<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Comentario;
use AppBundle\Form\ComentarioType;

class BlogController extends Controller
{
    /**
     * @Route("/{id}",name="blog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        //$em = $this->get('doctrine')->getManager();
        $post = $em->getRepository('AppBundle:Post')->find($id);
        if(!$post){
            
            throw $this->createNotFoundException('No se encontro ningun Post con ese ID');
        }
        $comentarios = $em->getRepository('AppBundle:Comentario')->findByPost($id);
        return array('post'=>$post,'comentarios'=>$comentarios);
        
    }
    
    /**
         * @Route("/{id}/comentario",name="comentario")
         * @Template()
         */
        public function comentarioAction($id){
            $request = $this->getRequest();
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository('AppBundle:Post')->find($id);
            $comentario = new Comentario();
            $form = $this->createForm(new ComentarioType(),$comentario);
            if($request->getMethod()=="POST"){
                $form->handleRequest($request);
                if($form->isValid()){
                    $comentario->setPost($post);
                    $comentario->setAprobado(false);
                    $em->persist($comentario);
                    $em->flush();
                    $this->addFlash('exito', 'Gracias por su comentario! Ha sido registrado con Éxito!');
                    return $this->redirect($this->generateUrl('blog_show',array('id'=>$id)));
                }
                
            }
            
            return array('form'=>$form->createView(),
                         'post'=>$post);
        }
}
