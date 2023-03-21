<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/modservicio/seguridad")
 */
class SeguridadController extends Controller{

   /**
    * @Route("/login", name="login_serv")
    * @Template()
    */
    public function loginAction(){
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();

        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)            
        );
        return array('last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                     'error' => $error);
    }
          
    /**
     * @Route("/logincheck", name="logincheck_serv")
     */
    public function logincheckAction(){
        // The security layer will intercept this request
    }
    
   /**
    * @Route("/logout", name="logout_serv")
    */
    public function logoutAction(){
        // The security layer will intercept this request
    }
    
}
