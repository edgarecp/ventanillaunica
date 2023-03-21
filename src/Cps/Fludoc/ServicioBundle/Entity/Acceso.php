<?php

namespace Cps\Fludoc\ServicioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="accesoServ")
 * @ORM\Entity(repositoryClass="Cps\Fludoc\ServicioBundle\Entity\AccesoRepository")
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
     * @ORM\ManyToOne(targetEntity="General\EmpresaBundle\Entity\Servicio", inversedBy="accesos")
     */
    private $servicio;
 
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
     * Set servicio
     *
     * @param \General\EmpresaBundle\Entity\Servicio $servicio
     * @return Acceso
     */
    public function setServicio(\General\EmpresaBundle\Entity\Servicio $servicio = null)
    {
        $this->servicio = $servicio;
    
        return $this;
    }

    /**
     * Get servicio
     *
     * @return \General\EmpresaBundle\Entity\Servicio 
     */
    public function getServicio()
    {
        return $this->servicio;
    }
}