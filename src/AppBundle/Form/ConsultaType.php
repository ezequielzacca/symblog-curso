<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConsultaType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('nombre');
        $builder->add('email','email');
        $builder->add('asunto');
        $builder->add('cuerpo','textarea');
                
    }
    
    public function getName() {
        return 'consulta';
    }
    
}


