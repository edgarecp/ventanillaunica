<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/modservicio")
 */
class MainController extends Controller{

    /**
     * @Route("/main", name="main_serv")
     * @Template("GeneralComunBundle:Main:index.html.twig")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
            
        $session   = $this->getRequest()->getSession();
        $accesoId  = $session->get('accesoId');

        $accAct    = $em->getRepository('CpsFludocServicioBundle:Acceso')->findOneById($accesoId);
        $accAnt    = $em->getRepository('CpsFludocServicioBundle:Acceso')->findOneAnt('CpsFludocServicioBundle:Acceso', $accesoId);
        $entitiesN = $em->getRepository('GeneralEmpresaBundle:Noticia')->findAllRec();
       
        return array('accAct'    => $accAct,
                     'accAnt'    => $accAnt,
                     'entitiesN' => $entitiesN,
                    );
    }
    
    /**
     * @Route("/acercade", name="acercade_serv")
     * @Template("GeneralComunBundle:Main:acercade.html.twig")
     */
    public function acercadeAction(){
        $this->entity["nombre"]      = "Sistemas de Documentacion";
        $this->entity["version"]     = "1.0";
        $this->entity["licencia"]    = "2013";
        $this->entity["autor"]       = "Hans Galarza Cortez";
        $this->entity["descripcion"] = "Modulo de servicio";
        return array('entity' => $this->entity, 'post' => 'Servicio', );
    }
    
    /**
     * @Route("/ayuda", name="ayuda_serv")
     * @Template()
     */
    public function ayudaAction(){
        return array();
    }
}
