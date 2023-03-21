<?php

namespace Cps\Fludoc\AdmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="docRec")
 * @ORM\Entity(repositoryClass="Cps\Fludoc\AdmBundle\Entity\DocrecRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Docrec{

    public function __construct(){
        $this->derivaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creadoEl;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $recepcionEl;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")     
     */
    private $cite;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")     
     */
    private $fechaDoc;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")     
     */
    private $referencia;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $institucionRem;

    /**
     * @ORM\Column(type="string", length=40)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")     
     */
    private $personaRem;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cargoRem;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Range(min = 1, minMessage = "El valor tiene que ser mayor a cero...")
     */
    private $folio;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize = "2000k")
     */
    private $archivo;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $pin;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificadoEl;
    
// === Funciones Auxiliares ============================================ //
	
	public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getRemite(){
        return $this->institucionRem.' '.$this->personaRem.' '.$this->cargoRem;
    }

    public function subirArchivo($directorioDestino){
        if ($this->archivo != null){
            $nombreArchivo = uniqid().'.'.$this->archivo->guessExtension();
            $this->archivo->move($directorioDestino, $nombreArchivo);
            $this->setArchivo($nombreArchivo);
        }
    }

// === Foraneas ======================================================== //

   /**
    * @ORM\ManyToOne(targetEntity="General\ComunBundle\Entity\Usuario", inversedBy="docrecs")
    */
    protected $usuario;
    
   /**
    * @ORM\OneToMany(targetEntity="Derivacion", mappedBy="docrec")     
    */
    private $derivaciones;
    
   /**
    * @ORM\ManyToOne(targetEntity="General\EmpresaBundle\Entity\Servicio", inversedBy="docrecs")
    */
    private $servicioActual;
    
   /**
    * @ORM\ManyToOne(targetEntity="General\ComunBundle\Entity\Estado", inversedBy="docrecs")
    */
    private $estadoActual;

// === RetroLLamadas =================================================== //
    
    /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
      $this->creadoEl       = new \dateTime();
      $this->institucionRem = ucwords(strtolower($this->institucionRem));
      $this->personaRem     = ucwords(strtolower($this->personaRem));
      $this->cargoRem       = ucwords(strtolower($this->cargoRem));
   }
   
    /**
     * @ORM\PreUpdate
     */
   public function PreUpdate(){
      $this->institucionRem = ucwords(strtolower($this->institucionRem));
      $this->personaRem     = ucwords(strtolower($this->personaRem));
      $this->cargoRem       = ucwords(strtolower($this->cargoRem));
   }
   
// === Validacion ====================================================== //

   /**
    * @Assert\True(message = "la Recepcion tiene que ser igual o posterior a la fecha del documento...")
    */
   public function isFechasOK(){
      return ($this->recepcionEl >= $this->fechaDoc);
   }    
   
// === Getter and Setter =============================================== //

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
     * @return Docrec
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
     * Set recepcionEl
     *
     * @param \DateTime $recepcionEl
     * @return Docrec
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
     * Set cite
     *
     * @param string $cite
     * @return Docrec
     */
    public function setCite($cite)
    {
        $this->cite = $cite;
    
        return $this;
    }

    /**
     * Get cite
     *
     * @return string 
     */
    public function getCite()
    {
        return $this->cite;
    }

    /**
     * Set fechaDoc
     *
     * @param \DateTime $fechaDoc
     * @return Docrec
     */
    public function setFechaDoc($fechaDoc)
    {
        $this->fechaDoc = $fechaDoc;
    
        return $this;
    }

    /**
     * Get fechaDoc
     *
     * @return \DateTime 
     */
    public function getFechaDoc()
    {
        return $this->fechaDoc;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return Docrec
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    
        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set institucionRem
     *
     * @param string $institucionRem
     * @return Docrec
     */
    public function setInstitucionRem($institucionRem)
    {
        $this->institucionRem = $institucionRem;
    
        return $this;
    }

    /**
     * Get institucionRem
     *
     * @return string 
     */
    public function getInstitucionRem()
    {
        return $this->institucionRem;
    }

    /**
     * Set personaRem
     *
     * @param string $personaRem
     * @return Docrec
     */
    public function setPersonaRem($personaRem)
    {
        $this->personaRem = $personaRem;
    
        return $this;
    }

    /**
     * Get personaRem
     *
     * @return string 
     */
    public function getPersonaRem()
    {
        return $this->personaRem;
    }

    /**
     * Set cargoRem
     *
     * @param string $cargoRem
     * @return Docrec
     */
    public function setCargoRem($cargoRem)
    {
        $this->cargoRem = $cargoRem;
    
        return $this;
    }

    /**
     * Get cargoRem
     *
     * @return string 
     */
    public function getCargoRem()
    {
        return $this->cargoRem;
    }

    /**
     * Set folio
     *
     * @param integer $folio
     * @return Docrec
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;
    
        return $this;
    }

    /**
     * Get folio
     *
     * @return integer 
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set archivo
     *
     * @param string $archivo
     * @return Docrec
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    
        return $this;
    }

    /**
     * Get archivo
     *
     * @return string 
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * Set pin
     *
     * @param string $pin
     * @return Docrec
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    
        return $this;
    }

    /**
     * Get pin
     *
     * @return string 
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set modificadoEl
     *
     * @param \DateTime $modificadoEl
     * @return Docrec
     */
    public function setModificadoEl($modificadoEl)
    {
        $this->modificadoEl = $modificadoEl;
    
        return $this;
    }

    /**
     * Get modificadoEl
     *
     * @return \DateTime 
     */
    public function getModificadoEl()
    {
        return $this->modificadoEl;
    }

    /**
     * Set usuario
     *
     * @param \General\ComunBundle\Entity\Usuario $usuario
     * @return Docrec
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

    /**
     * Add derivaciones
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones
     * @return Docrec
     */
    public function addDerivacione(\Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones)
    {
        $this->derivaciones[] = $derivaciones;
    
        return $this;
    }

    /**
     * Remove derivaciones
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones
     */
    public function removeDerivacione(\Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones)
    {
        $this->derivaciones->removeElement($derivaciones);
    }

    /**
     * Get derivaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDerivaciones()
    {
        return $this->derivaciones;
    }

    /**
     * Set servicioActual
     *
     * @param \General\EmpresaBundle\Entity\Servicio $servicioActual
     * @return Docrec
     */
    public function setServicioActual(\General\EmpresaBundle\Entity\Servicio $servicioActual = null)
    {
        $this->servicioActual = $servicioActual;
    
        return $this;
    }

    /**
     * Get servicioActual
     *
     * @return \General\EmpresaBundle\Entity\Servicio 
     */
    public function getServicioActual()
    {
        return $this->servicioActual;
    }

    /**
     * Set estadoActual
     *
     * @param \General\ComunBundle\Entity\Estado $estadoActual
     * @return Docrec
     */
    public function setEstadoActual(\General\ComunBundle\Entity\Estado $estadoActual = null)
    {
        $this->estadoActual = $estadoActual;
    
        return $this;
    }

    /**
     * Get estadoActual
     *
     * @return \General\ComunBundle\Entity\Estado 
     */
    public function getEstadoActual()
    {
        return $this->estadoActual;
    }
}
