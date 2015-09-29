<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
        return array('post'=>$post);
        /**$post = $em->getRepository('AppBundle:Post')->findOneBy(array('titulo'=>'Symfony','autor'=>'Ezequiel'));
        $posts = $em->getRepository('AppBundle:Post')->findAll();
        $posts = $em->getRepository('AppBundle:Post')->findByAutor('Ezequiel');
        $posts = $em->getRepository('AppBundle:Post')->findByTitulo('Symfony');
        $posts = $em->getRepository('AppBundle:Post')->findBy(array('titulo'=>'Symfony','autor'=>'Ezequiel'));**/
        
        
       
        
        
        
        
    }
}
