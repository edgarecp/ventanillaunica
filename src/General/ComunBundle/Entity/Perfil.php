<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gen_perfil")
 * @ORM\Entity(repositoryClass="General\ComunBundle\Entity\PerfilRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Perfil{

    public function __construct(){
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Ingrese el Nombre...")
     */
    private $nombre;
    
// === Foraneas ======================================================== //

    /**
     * @ORM\OneToMany(targetEntity="Usuario", mappedBy="perfil")
     */
    protected $usuarios;

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
     * @return Perfil
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
     * Add usuarios
     *
     * @param \General\ComunBundle\Entity\Usuario $usuarios
     * @return Perfil
     */
    public function addUsuario(\General\ComunBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios[] = $usuarios;
    
        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \General\ComunBundle\Entity\Usuario $usuarios
     */
    public function removeUsuario(\General\ComunBundle\Entity\Usuario $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}