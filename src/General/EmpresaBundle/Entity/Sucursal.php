<?php

namespace General\EmpresaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gen_sucursal")
 * @ORM\Entity(repositoryClass="General\EmpresaBundle\Entity\SucursalRepository")
 */
class Sucursal{

    public function __construct(){
        $this->permisos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $abreviatura;
    
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $direccion;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Image(maxSize = "500k")
     */
    private $foto;
    
    /**
     * @ORM\Column(type="string", length=15)
     */
    private $ipMaqCli;
    
// === Foraneas ======================================================== //    
// === Otras Funciones ================================================= //
    
    public function __toString(){
        return $this->getNombre();
    }
    
    public function subirFoto($directorioDestino){
        //if (null === $this->foto) return;
        if ($this->foto != null){
            $nombreArchivoFoto = uniqid('cupon-').'-1.'.$this->foto->guessExtension();
            $this->foto->move($directorioDestino, $nombreArchivoFoto);
            $this->setFoto($nombreArchivoFoto);
        }
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
     * Set nombre
     *
     * @param string $nombre
     * @return Sucursal
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
     * @return Sucursal
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
     * Set direccion
     *
     * @param string $direccion
     * @return Sucursal
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Sucursal
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set ipMaqCli
     *
     * @param string $ipMaqCli
     * @return Sucursal
     */
    public function setIpMaqCli($ipMaqCli)
    {
        $this->ipMaqCli = $ipMaqCli;
    
        return $this;
    }

    /**
     * Get ipMaqCli
     *
     * @return string 
     */
    public function getIpMaqCli()
    {
        return $this->ipMaqCli;
    }
}