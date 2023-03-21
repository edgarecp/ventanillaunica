<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Table(name="gen_feriado")
 * @ORM\Entity(repositoryClass="General\ComunBundle\Entity\FeriadoRepository")
 * @DoctrineAssert\UniqueEntity("fecha") 
 */
class Feriado{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $fecha;
    
    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $tipo;
    
    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank(message="Este campo no puede estar Vacio...")
     */
    private $nombre;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Feriado
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
     * Set tipo
     *
     * @param string $tipo
     * @return Feriado
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
     * Set nombre
     *
     * @param string $nombre
     * @return Feriado
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
}