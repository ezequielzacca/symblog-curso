<?php

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class CargarPosts extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        
        $array_palabras = array('Symfony','PHP','Famework','Desarrollo Agil','Aplicaciones');
        $array_autores = array('Ezequiel','Matias','Jorge','Juan');
        for($i=1;$i<=100;$i++){
            $post = new Post();
            $post->setTitulo($array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)]);
            $post->setAutor($array_autores[array_rand($array_autores)]);
            $post->setImagen('symfony1.gif');
            $fecha = new \DateTime();
            $numeroDias = rand(1,1000);
            $fecha->modify('-'.$numeroDias.' day');
            $post->setFechaCreacion($fecha);
            $post->setCuerpo('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae sapien eros. Nulla facilisi. Aliquam id sodales mauris. Fusce venenatis leo ut leo condimentum sollicitudin. Nam rhoncus turpis sit amet leo posuere, sed accumsan purus mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus non hendrerit nulla. Nulla volutpat dignissim dui, sit amet posuere odio maximus in. Etiam ut leo commodo, laoreet lectus eu, ultrices diam. Vivamus id dictum leo. Praesent congue sem nec metus congue euismod. In rhoncus ex finibus iaculis consectetur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque eu nibh nec enim pretium pretium vitae nec ipsum. Vivamus mollis lacus ut neque ultrices, sed tincidunt nulla hendrerit.');
            $manager->persist($post);
            $this->addReference('post-'.$i,$post);        
        }
        
        
        
        /*$post1 = new Post();
        $post1->setTitulo('Symfony es un framework PHP');
        $post1->setAutor('Ezequiel');
        $post1->setImagen('symfony1.gif');
        $post1->setFechaCreacion(new \DateTime());
        $post1->setCuerpo('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae sapien eros. Nulla facilisi. Aliquam id sodales mauris. Fusce venenatis leo ut leo condimentum sollicitudin. Nam rhoncus turpis sit amet leo posuere, sed accumsan purus mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus non hendrerit nulla. Nulla volutpat dignissim dui, sit amet posuere odio maximus in. Etiam ut leo commodo, laoreet lectus eu, ultrices diam. Vivamus id dictum leo. Praesent congue sem nec metus congue euismod. In rhoncus ex finibus iaculis consectetur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque eu nibh nec enim pretium pretium vitae nec ipsum. Vivamus mollis lacus ut neque ultrices, sed tincidunt nulla hendrerit.');
        $manager->persist($post1);
        */
        $manager->flush();
        
    }
    
    public function getOrder(){
                return 1;
        }
}
