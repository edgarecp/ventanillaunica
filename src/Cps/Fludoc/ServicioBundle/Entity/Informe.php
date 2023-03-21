<?php

namespace Cps\Fludoc\ServicioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="informe")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Informe{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Ingrese la fecha creadoEl...")     
     */
    private $creadoEl;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="El DETALLE no debe estar vacio...")
     */
    private $detalle;
    
// === FORANEAS ========================================================= //

   /**
    * @ORM\ManyToOne(targetEntity="Cps\Fludoc\AdmBundle\Entity\Derivacion", inversedBy="informes")
    * @Assert\NotBlank(message="La DERIVACION no debe estar vacia...")
    */
    private $derivacion;
    
   /**
    * @ORM\ManyToOne(targetEntity="General\ComunBundle\Entity\Estado", inversedBy="informes")
    * @Assert\NotBlank(message="EL ESTADO no debe estar vacio...")
    */
    private $estado;
    
// === RETROLLAMADAS =================================================== //
    
    /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
      $this->setCreadoEl(new \DateTime());
   }
   
// === Funciones Auxiliares ============================================ //
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
     * Set creadoEl
     *
     * @param \DateTime $creadoEl
     * @return Informe
     */
    public function setCreadoEl($creadoEl)
    {
        $this->creadoEl = $creadoEl;
    
        return $this;
    }

    /**
     * Get creadoEl
     *
     * @return \DateTime 
     */
    public function getCreadoEl()
    {
        return $this->creadoEl;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return Informe
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    
        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set derivacion
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Derivacion $derivacion
     * @return Informe
     */
    public function setDerivacion(\Cps\Fludoc\AdmBundle\Entity\Derivacion $derivacion = null)
    {
        $this->derivacion = $derivacion;
    
        return $this;
    }

    /**
     * Get derivacion
     *
     * @return \Cps\Fludoc\AdmBundle\Entity\Derivacion 
     */
    public function getDerivacion()
    {
        return $this->derivacion;
    }

    /**
     * Set estado
     *
     * @param \General\ComunBundle\Entity\Estado $estado
     * @return Informe
     */
    public function setEstado(\General\ComunBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \General\ComunBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}