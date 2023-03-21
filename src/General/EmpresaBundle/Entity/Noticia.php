<?php

namespace General\EmpresaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gen_noticia")
 * @ORM\Entity(repositoryClass="General\EmpresaBundle\Entity\NoticiaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Noticia{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $creadoEl;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $desdeEl;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $hastaEl;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;
    
// === Foraneas ======================================================== //

   /**
    * @ORM\ManyToOne(targetEntity="General\ComunBundle\Entity\Usuario", inversedBy="noticias")
    */
   protected $usuario;
   
// === RetroLLamadas ================================================== //
   /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
      $this->grabadoEl = new \DateTime();
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
     * @return Noticia
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
     * Set desdeEl
     *
     * @param \DateTime $desdeEl
     * @return Noticia
     */
    public function setDesdeEl($desdeEl)
    {
        $this->desdeEl = $desdeEl;
    
        return $this;
    }

    /**
     * Get desdeEl
     *
     * @return \DateTime 
     */
    public function getDesdeEl()
    {
        return $this->desdeEl;
    }

    /**
     * Set hastaEl
     *
     * @param \DateTime $hastaEl
     * @return Noticia
     */
    public function setHastaEl($hastaEl)
    {
        $this->hastaEl = $hastaEl;
    
        return $this;
    }

    /**
     * Get hastaEl
     *
     * @return \DateTime 
     */
    public function getHastaEl()
    {
        return $this->hastaEl;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Noticia
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set usuario
     *
     * @param \General\ComunBundle\Entity\Usuario $usuario
     * @return Noticia
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