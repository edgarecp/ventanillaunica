<?php

namespace General\ComunBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * @ORM\Table(name="gen_usuario")
 * @ORM\Entity(repositoryClass="General\ComunBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity("login") 
 * @ORM\HasLifecycleCallbacks() 
 */
class Usuario implements UserInterface, EquatableInterface, \Serializable {

// Metodos requerido por la interfaz UserInterface ============================================
    
    public function getUsername(){
        return $this->login;
    }
    
    public function isEqualTo(UserInterface $usuario){
        return $this->getUsername() == $usuario->getUsername();
    }
    
    public function eraseCredentials(){
    }

    public function getRoles(){
        $resp = 'ROLE_ADMIN';
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
        $this->accesos  = new \Doctrine\Common\Collections\ArrayCollection();
        $this->noticias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->docrecs  = new \Doctrine\Common\Collections\ArrayCollection();                
    }
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
    * @ORM\Column(type="string", length=35)
    * @Assert\NotBlank(message="El NOMBRE no debe estar vacio...")
    * @Assert\Length(min=5)
    */
    private $nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $ingresoEl;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $retiroEl;

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
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $creadoEl;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modifiEl;

// === Foraneas ======================================================== //

   /**
    * @ORM\ManyToOne(targetEntity="Perfil", inversedBy="usuarios")
    */
   protected $perfil;
   
   /**
    * @ORM\OneToMany(targetEntity="Acceso", mappedBy="usuario")
    */
   protected $accesos;
   
   /**
    * @ORM\OneToMany(targetEntity="General\EmpresaBundle\Entity\Noticia", mappedBy="usuario")
    */
   protected $noticias;
   
   /**
    * @ORM\OneToMany(targetEntity="Cps\Fludoc\AdmBundle\Entity\Docrec", mappedBy="usuario")
    */
   protected $docrecs;

// === Funciones Auxiliares ============================================ //
    
    public function __toString(){
        return $this->nombre;
    }
    
// === Retrollamadas =================================================== //
    
    /**
     * @ORM\PrePersist
     */
   public function PrePersist(){
      $this->login    = strtolower($this->login);
      $this->nombre   = ucwords(strtolower($this->nombre));
      $this->creadoEl = new \DateTime();
   }
   
    /**
     * @ORM\PreUpdate
     */
   public function PreUpdate(){
      $this->login    = strtolower($this->login);
      $this->nombre   = ucwords(strtolower($this->nombre));
      $this->modifiEl = new \DateTime();
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
     * @return Usuario
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
     * Set ingresoEl
     *
     * @param \DateTime $ingresoEl
     * @return Usuario
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
     * Set retiroEl
     *
     * @param \DateTime $retiroEl
     * @return Usuario
     */
    public function setRetiroEl($retiroEl)
    {
        $this->retiroEl = $retiroEl;
    
        return $this;
    }

    /**
     * Get retiroEl
     *
     * @return \DateTime 
     */
    public function getRetiroEl()
    {
        return $this->retiroEl;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Usuario
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
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Set creadoEl
     *
     * @param \DateTime $creadoEl
     * @return Usuario
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
     * Set modifiEl
     *
     * @param \DateTime $modifiEl
     * @return Usuario
     */
    public function setModifiEl($modifiEl)
    {
        $this->modifiEl = $modifiEl;
    
        return $this;
    }

    /**
     * Get modifiEl
     *
     * @return \DateTime 
     */
    public function getModifiEl()
    {
        return $this->modifiEl;
    }

    /**
     * Set perfil
     *
     * @param \General\ComunBundle\Entity\Perfil $perfil
     * @return Usuario
     */
    public function setPerfil(\General\ComunBundle\Entity\Perfil $perfil = null)
    {
        $this->perfil = $perfil;
    
        return $this;
    }

    /**
     * Get perfil
     *
     * @return \General\ComunBundle\Entity\Perfil 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Add accesos
     *
     * @param \General\ComunBundle\Entity\Acceso $accesos
     * @return Usuario
     */
    public function addAcceso(\General\ComunBundle\Entity\Acceso $accesos)
    {
        $this->accesos[] = $accesos;
    
        return $this;
    }

    /**
     * Remove accesos
     *
     * @param \General\ComunBundle\Entity\Acceso $accesos
     */
    public function removeAcceso(\General\ComunBundle\Entity\Acceso $accesos)
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

    /**
     * Add noticias
     *
     * @param \General\EmpresaBundle\Entity\Noticia $noticias
     * @return Usuario
     */
    public function addNoticia(\General\EmpresaBundle\Entity\Noticia $noticias)
    {
        $this->noticias[] = $noticias;
    
        return $this;
    }

    /**
     * Remove noticias
     *
     * @param \General\EmpresaBundle\Entity\Noticia $noticias
     */
    public function removeNoticia(\General\EmpresaBundle\Entity\Noticia $noticias)
    {
        $this->noticias->removeElement($noticias);
    }

    /**
     * Get noticias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoticias()
    {
        return $this->noticias;
    }

    /**
     * Add docrecs
     *
     * @param \Cps\Fludoc\AdmBundle\Entity\Docrec $docrecs
     * @return Usuario
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
