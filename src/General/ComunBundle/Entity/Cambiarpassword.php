<?php

namespace General\ComunBundle\Entity;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class Cambiarpassword{

    /**
     * @SecurityAssert\UserPassword( message = "Error en la clave ACTUAL..." )
     */
    protected $oldPassword;

    /**
     * @Assert\Length( min = 5, minMessage = "La Clave tiene que ser minimo 5 caracteres..." )
     */
    protected $newPassword;
     
    public function getOldPassword(){
        return $this->oldPassword;
    }
    
    public function getNewPassword(){
        return $this->newPassword;
    }
    
    public function setOldPassword($password){
        $this->oldPassword = $password;
        return $this;
    }

    public function setNewPassword($password){
        $this->newPassword = $password;
        return $this;
    }

}
