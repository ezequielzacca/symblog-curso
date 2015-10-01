<?php

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Comentario;

class CargarComentarios extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        
        $array_palabras = array('symfony','PHP','framework','desarrollo agil','aplicaciones');
        $array_usuarios = array('Ezequiel','Jorge','Ivan','Romina','Analia');
        for($i=1;$i<=1000;$i++){
            $comentario = new Comentario();
            $comentario->setUsuario($array_usuarios[array_rand($array_usuarios)]);
            $comentario->setAprobado(true);
            $cuerpo = $array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)].' '.$array_palabras[array_rand($array_palabras)];
            $comentario->setCuerpo($cuerpo);
            $indice = rand(1,100);
            $comentario->setPost($this->getReference('post-'.$indice));
            $manager->persist($comentario);
                    
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
        return 2;
    }
}
