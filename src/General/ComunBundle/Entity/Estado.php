<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gen_estado")
 * @ORM\Entity(repositoryClass="General\ComunBundle\Entity\EstadoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Estado{

    public function __construct(){
        $this->derivaciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->informes     = new \Doctrine\Common\Collections\ArrayCollection();
        $this->docrecs      = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Ingrese el Nombre...")
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank(message="Ingrese la Abreviatura...")
     */
    private $abreviatura;

    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank(message="Ingrese el Tipo...")
     */
    private $tipo;
    
// === Foraneas ======================================================== //

    /**
     * @ORM\OneToMany(targetEntity="Cps\Fludoc\AdmBundle\Entity\Derivacion", mappedBy="estado")
     */
    protected $derivaciones;

    /**
     * @ORM\OneToMany(targetEntity="Cps\Fludoc\ServicioBundle\Entity\Informe", mappedBy="estado")
     */
    protected $informes;
    
   /**
    * @ORM\OneToMany(targetEntity="Cps\Fludoc\AdmBundle\Entity\Docrec", mappedBy="estadoActual")
    */
   protected $docrecs;

// === Funciones Auxiliares ============================================ //

    public function __toString(){
        return $this->getNombre();
    }

// === RetroLLamadas =================================================== //

    /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
        $this->nombre  = ucwords(strtolower($this->nombre));
   }
   
    /**
     * @ORM\PreUpdate
     */
   public function PreUpdate(){
        $this->nombre  = ucwords(strtolower($this->nombre));
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
     * Set nombre
     *
     * @param string $nombre
     * @return Estado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return Estado
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Estado
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add derivaciones
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones
     * @return Estado
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
     * Add informes
     *
     * @param \Cps\Fludoc\ServicioBundle\Entity\Informe $informes
     * @return Estado
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

    /**
     * Add docrecs
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs
     * @return Estado
     */
    public function addDocrec(\Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs)
    {
        $this->docrecs[] = $docrecs;
    
        return $this;
    }

    /**
     * Remove docrecs
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs
     */
    public function removeDocrec(\Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs)
    {
        $this->docrecs->removeElement($docrecs);
    }

    /**
     * Get docrecs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocrecs()
    {
        return $this->docrecs;
    }
}