<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use General\EmpresaBundle\Entity\Servicio;
use General\EmpresaBundle\Form\ServicioType;
use General\EmpresaBundle\Form\ServiciofiltroType;

use General\ComunBundle\Entity\Cambiarpassword;
use General\ComunBundle\Form\CambiarpasswordType;

/**
 * @Route("/modservicio/servicio")
 */
class ServicioController extends Controller{
   
    public function __construct(){
        $this->rut = "servicio_serv";
        $this->bun = "GeneralEmpresaBundle";
        $this->ent = "Servicio";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/index", name="servicio_serv")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.nombre'); $session->set('orddir', 'asc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', 'Servicio');
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }

    /**
     * @Route("/listado", name="servicio_serv_listado")
     * @Method("GET")     
     * @Template()
     */
    public function listadoAction(){
        $em = $this->getDoctrine()->getManager();
        
        $ord = $this->getRequest()->query->get('ord'); $orddir = $this->getRequest()->query->get('orddir'); 
        $pag = $this->getRequest()->query->get('pag');        
        $session = $this->getRequest()->getSession();
        if ($ord    == null) $ord    = $session->get('ord');    else $session->set('ord', $ord);
        if ($orddir == null) $orddir = $session->get('orddir'); else $session->set('orddir', $orddir);
        if ($pag    == null) $pag    = $session->get('pag');    else $session->set('pag', $pag);
        $fil = $session->get('fil');
        $cxp = $session->get('cxp');
        
        $paginador  = $this->get('knp_paginator');
        $entities   = $em->getRepository($this->rep)->findTodos($this->rep, $fil);
        $paginacion = $paginador->paginate($entities, $pag, $cxp);
        
        if ($paginacion->getTotalItemCount() == 0 and $fil != ' ')
            return $this->redirect($this->generateUrl($this->rut.'_filtrar', array('msj' => 'No existen Registros...')));
            
        $cantReg  = $em->getRepository($this->rep)->cantReg($this->rep);
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    private function getPasswordCodificado($entity, $password){
        $encoder = $this->get('security.encoder_factory')->getEncoder($entity);
        $passwordCodificado = $encoder->encodePassword($password, $entity->getSalt());
        return $passwordCodificado;
    }            
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="servicio_serv_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));        
    }

    /**
     * @Route("/cambPass", name="servicio_serv_cambpass")
     * @Template("CpsFludocServicioBundle:Servicio:cambpass.html.twig")
     */
    public function cambpassAction(){
        $entityCP = new Cambiarpassword();
        $form   = $this->createForm(new CambiarpasswordType(), $entityCP);
        return array('entity' => $entityCP, 'form' => $form->createView(), 'vRuta' => $this->rut);
    }

    /**
     * @Route("/cambpassupdate", name="servicio_serv_cambpass_update")
     * @Method("POST")
     * @Template("CpsFludocServicioBundle:Servicio:cambpass.html.twig")
     */
    public function cambpassupdateAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $entity = $this->get('security.context')->getToken()->getUser();
        $entityCP = new Cambiarpassword();        
        $form   = $this->createForm(new CambiarpasswordType(), $entityCP);
        $form->bind($request);
        if ($form->isValid()) {
            $entity->setPassword($this->getPasswordCodificado($entity, $entityCP->getNewPassword()));
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('acceso_regsalida_serv'));
        }
        return array('entity' => $entityCP, 'form' => $form->createView(), 'vRuta' => $this->rut);
    }

//================================= FILTRAR ==========================================

    /**
     * @Route("/filtrar/opciones/{msj}", name="servicio_serv_filtrar", defaults={"msj"=""})
     * @Template("GeneralEmpresaBundle:Servicio:filtrar.html.twig")
     */
    public function filtrarAction($msj){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new ServiciofiltroType());
        return array('form' => $form->createView(), 'msj' => $msj, 'cantReg' => $cantReg, 'vRuta' => $this->rut, 'vTit' => 'Servicio');
    }

    /**
     * @Route("/filtrar/procesar", name="servicio_serv_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new ServiciofiltroType());
        $form->bind($request);
        $data = $request->request->get('general_empresabundle_serviciofiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $filtro = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }

}
