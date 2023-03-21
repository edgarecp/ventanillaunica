<?php

namespace General\ComunBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/main")
 */
class MainController extends Controller{

    /**
     * @Route("", name="main")
     * @Template()
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
            
        $session = $this->getRequest()->getSession();
        $accesoId = $session->get('accesoId');
        
        $accAct    = $em->getRepository('GeneralComunBundle:Acceso')->findOneById($accesoId);
        $accAnt    = $em->getRepository('GeneralComunBundle:Acceso')->findOneAnt($accesoId);
        $entitiesN = $em->getRepository('GeneralEmpresaBundle:Noticia')->findAllRec();
       
        return array('accAct' => $accAct, 'accAnt' => $accAnt, 'entitiesN' => $entitiesN, );
    }
    
    /**
     * @Route("/acercade", name="acercade")
     * @Template()
     */
    public function acercadeAction(){
        $this->entity["nombre"]      = "Sistemas de Documentacion";
        $this->entity["version"]     = "1.0";
        $this->entity["licencia"]    = "2013";
        $this->entity["autor"]       = "Hans Galarza Cortez";
        $this->entity["descripcion"] = "Modulo Administrativo - Backend";
        return array('entity' => $this->entity,);
    }

    /**
     * @Route("/ayuda", name="ayuda")
     * @Template()
     */
    public function ayudaAction(){
        return array();
    }

}
