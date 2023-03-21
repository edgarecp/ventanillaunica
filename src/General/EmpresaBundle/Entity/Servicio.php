<?php

namespace General\EmpresaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Table(name="gen_servicio")
 * @ORM\Entity(repositoryClass="General\EmpresaBundle\Entity\ServicioRepository")
 * @DoctrineAssert\UniqueEntity("login") 
 * @ORM\HasLifecycleCallbacks()
 */
class Servicio implements UserInterface, EquatableInterface, \Serializable {

// Metodos requerido por la interfaz UserInterface ============================================
    
    public function getUsername(){
        return $this->login;
    }
    
    public function isEqualTo(UserInterface $servicio){
        return $this->getUsername() == $servicio->getUsername();
    }
    
    public function eraseCredentials(){
    }

    public function getRoles(){
        $resp = 'ROLE_SERVICIO';
        return array($resp);
    }
    
    public function getSalt(){
        return false;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
// Metodos requerido cuando la entidad USUARIO se relaciona con Cargo o Rol ==================   

    public function serialize(){
       return serialize($this->getId());
    }
 
    public function unserialize($data){
        $this->id = unserialize($data);
    } 
            
//=============================================================================================

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
     * @ORM\Column(type="string", length=35)
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $abreviatura;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telf;
    
    /**
     * @ORM\Column(type="string", length=5)
     */
    private $telfInterno;

    /**
    * @ORM\Column(type="string", length=8, unique=true)
    * @Assert\NotBlank(message="El LOGIN no debe estar vacio...")
    * @Assert\Length(min=4, max=8)
    */
    private $login;

   /**
    * @ORM\Column(type="string", nullable=true)
    * @Assert\Length(min=5)
    */
    private $password;
    
// === Otras Funciones ================================================= //

    public function __toString(){
        return $this->getNombre();
    }
    
// === Foraneas ======================================================== //

  /**
   * @ORM\OneToMany(targetEntity="Cps\Fludoc\AdmBundle\Entity\Derivacion", mappedBy="servicio")
   */
   protected $derivaciones;
   
   /**
    * @ORM\OneToMany(targetEntity="Cps\Fludoc\ServicioBundle\Entity\Acceso", mappedBy="servicio")
    */
   protected $accesos;
   
   /**
    * @ORM\OneToMany(targetEntity="Cps\Fludoc\AdmBundle\Entity\Docrec", mappedBy="servicioActual")
    */
   protected $docrecs;
   
// === RetroLLamadas =================================================== //

    /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
        $this->nombre = ucwords(strtolower($this->nombre));
   }
   
    /**
     * @ORM\PreUpdate
     */
   public function PreUpdate(){
        $this->nombre = ucwords(strtolower($this->nombre));
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
     * @return Servicio
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
     * @return Servicio
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
     * Set telf
     *
     * @param string $telf
     * @return Servicio
     */
    public function setTelf($telf)
    {
        $this->telf = $telf;
    
        return $this;
    }

    /**
     * Get telf
     *
     * @return string 
     */
    public function getTelf()
    {
        return $this->telf;
    }

    /**
     * Set telfInterno
     *
     * @param string $telfInterno
     * @return Servicio
     */
    public function setTelfInterno($telfInterno)
    {
        $this->telfInterno = $telfInterno;
    
        return $this;
    }

    /**
     * Get telfInterno
     *
     * @return string 
     */
    public function getTelfInterno()
    {
        return $this->telfInterno;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Servicio
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Servicio
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Add derivaciones
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Derivacion $derivaciones
     * @return Servicio
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
     * Add docrecs
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs
     * @return Servicio
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

    /**
     * Add accesos
     *
     * @param \Cps\Fludoc\ServicioBundle\Entity\Acceso $accesos
     * @return Servicio
     */
    public function addAcceso(\Cps\Fludoc\ServicioBundle\Entity\Acceso $accesos)
    {
        $this->accesos[] = $accesos;
    
        return $this;
    }

    /**
     * Remove accesos
     *
     * @param \Cps\Fludoc\ServicioBundle\Entity\Acceso $accesos
     */
    public function removeAcceso(\Cps\Fludoc\ServicioBundle\Entity\Acceso $accesos)
    {
        $this->accesos->removeElement($accesos);
    }

    /**
     * Get accesos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccesos()
    {
        return $this->accesos;
    }
}
