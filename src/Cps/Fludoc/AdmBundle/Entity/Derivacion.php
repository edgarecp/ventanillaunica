<?php

namespace Cps\Fludoc\AdmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="derivacion")
 * @ORM\Entity(repositoryClass="Cps\Fludoc\AdmBundle\Entity\DerivacionRepository")
 */
class Derivacion{

    public function __construct(){
        $this->informes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Ingrese la fecha ...")
     */
    private $fecha;
    
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $observacion;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $recepcionEl;   

// === FORANEAS ======================================================== //    

   /**
    * @ORM\ManyToOne(targetEntity="General\EmpresaBundle\Entity\Servicio", inversedBy="derivaciones")
    * @Assert\NotBlank(message="Ingrese el Servicio...")    
    */
    private $servicio;
    
   /**
    * @ORM\ManyToOne(targetEntity="Docrec", inversedBy="derivaciones")
    */
    private $docrec;
    
   /**
    * @ORM\ManyToOne(targetEntity="General\ComunBundle\Entity\Estado", inversedBy="derivaciones")
    * @Assert\NotBlank(message="Ingrese el Estado...")    
    */
    private $estado;
    
   /**
    * @ORM\OneToMany(targetEntity="Cps\Fludoc\ServicioBundle\Entity\Informe", mappedBy="derivacion")
    */
    private $informes;
    
// === Funciones Auxiliares ============================================ //
    
    public function __toString(){
        return $this->observacion;
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Derivacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Derivacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set recepcionEl
     *
     * @param \DateTime $recepcionEl
     * @return Derivacion
     */
    public function setRecepcionEl($recepcionEl)
    {
        $this->recepcionEl = $recepcionEl;
    
        return $this;
    }

    /**
     * Get recepcionEl
     *
     * @return \DateTime 
     */
    public function getRecepcionEl()
    {
        return $this->recepcionEl;
    }

    /**
     * Set servicio
     *
     * @param \General\EmpresaBundle\Entity\Servicio $servicio
     * @return Derivacion
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

    /**
     * Set docrec
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Docrec $docrec
     * @return Derivacion
     */
    public function setDocrec(\Cps\Fludoc\AdmBundle\Entity\Docrec $docrec = null)
    {
        $this->docrec = $docrec;
    
        return $this;
    }

    /**
     * Get docrec
     *
     * @return \Cps\Fludoc\AdmBundle\Entity\Docrec 
     */
    public function getDocrec()
    {
        return $this->docrec;
    }

    /**
     * Set estado
     *
     * @param \General\ComunBundle\Entity\Estado $estado
     * @return Derivacion
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

    /**
     * Add informes
     *
     * @param \Cps\Fludoc\ServicioBundle\Entity\Informe $informes
     * @return Derivacion
     */
    public function addInforme(\Cps\Fludoc\ServicioBundle\Entity\Informe $informes)
    {
        $this->informes[] = $informes;
    
        return $this;
    }

    /**
     * Remove informes
     *
     * @param \Cps\Fludoc\ServicioBundle\Entity\Informe $informes
     */
    public function removeInforme(\Cps\Fludoc\ServicioBundle\Entity\Informe $informes)
    {
        $this->informes->removeElement($informes);
    }

    /**
     * Get informes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInformes()
    {
        return $this->informes;
    }
}