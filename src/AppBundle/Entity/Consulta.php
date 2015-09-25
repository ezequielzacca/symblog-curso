<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Consulta{
    
    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3,minMessage="Debe ser mayor a tres caracteres")
     */
    protected $nombre;
    
    /**
     *
     * @Assert\Email(message="Debe ser un email valido")
     */
    protected $email;
    
    /**
     *
     * @Assert\NotBlank(message="No puede estar vacio")
     * @Assert\Length(min=3,minMessage="Debe ser mayor a tres caracteres")
     */
    protected $asunto;
    
    /**
     *
     * @Assert\NotBlank(message="No puede estar vacio")
     * @Assert\Length(min=50,minMessage="Debe ser mayor a cincuenta caracteres")
     */
    protected $cuerpo;
    
    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getCuerpo() {
        return $this->cuerpo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setCuerpo($cuerpo) {
        $this->cuerpo = $cuerpo;
    }


}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

