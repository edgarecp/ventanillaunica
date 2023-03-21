<?php

namespace General\ComunBundle\Entity;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_acceso")
 * @ORM\Entity(repositoryClass="General\ComunBundle\Entity\AccesoRepository")
 * @ORM\HasLifecycleCallbacks() 
 */
class Acceso{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ingresoEl;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $salidaEl;
    
    /**
     * @ORM\Column(type="string", length=15)
     */
    private $maquina;
    
// === Foraneas ======================================================== //

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="accesos")
     */
    private $usuario;
 
// === Funciones Auxiliares ============================================ //
// === Retrollamadas =================================================== //
    
   /**
    * @ORM\PrePersist
    */
    public function PrePersist(){
        $this->setIngresoEl(new \DateTime());
    }

// === Gets y Sets ===================================================== //

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ingresoEl
     *
     * @param \DateTime $ingresoEl
     * @return Acceso
     */
    public function setIngresoEl($ingresoEl)
    {
        $this->ingresoEl = $ingresoEl;
    
        return $this;
    }

    /**
     * Get ingresoEl
     *
     * @return \DateTime 
     */
    public function getIngresoEl()
    {
        return $this->ingresoEl;
    }

    /**
     * Set salidaEl
     *
     * @param \DateTime $salidaEl
     * @return Acceso
     */
    public function setSalidaEl($salidaEl)
    {
        $this->salidaEl = $salidaEl;
    
        return $this;
    }

    /**
     * Get salidaEl
     *
     * @return \DateTime 
     */
    public function getSalidaEl()
    {
        return $this->salidaEl;
    }

    /**
     * Set maquina
     *
     * @param string $maquina
     * @return Acceso
     */
    public function setMaquina($maquina)
    {
        $this->maquina = $maquina;
    
        return $this;
    }

    /**
     * Get maquina
     *
     * @return string 
     */
    public function getMaquina()
    {
        return $this->maquina;
    }

    /**
     * Set usuario
     *
     * @param \General\ComunBundle\Entity\Usuario $usuario
     * @return Acceso
     */
    public function setUsuario(\General\ComunBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \General\ComunBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}