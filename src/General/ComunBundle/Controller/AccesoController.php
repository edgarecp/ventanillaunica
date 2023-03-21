<?php

namespace General\ComunBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Entity\Acceso;
use General\ComunBundle\Libreria\Filtrar;
use General\ComunBundle\Form\AccesofiltroType;

/**
 * @Route("/acceso")
 */
class AccesoController extends Controller{

    public function __construct(){
        $this->rut = "acceso";
        $this->bun = "GeneralComunBundle";
        $this->ent = "Acceso";
        $this->rep = $this->bun.':'.$this->ent;
    }
    
    /**
     * @Route("/index", name="acceso")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.ingresoEl'); $session->set('orddir', 'desc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', $this->ent);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="acceso_listado")
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
        $query      = $em->getRepository($this->rep)->findTodos($fil);
        $paginacion = $paginador->paginate($query, $pag, $cxp);
        
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/registraringreso", name="acceso_regingreso")
     */
    public function registraringresoAction(){
        $entity  = new Acceso();
        $em = $this->getDoctrine()->getManager();
        $entity->setUsuario($this->get('security.context')->getToken()->getUser());
        $entity->setMaquina($this->getRequest()->getClientIp());
        $em->persist($entity);
        $em->flush();
        $session = $this->getRequest()->getSession();
        $session->set('accesoId', $entity->getId());
        return $this->redirect($this->generateUrl('main'));
    }
    
    /**
     * @Route("/registrarsalida", name="acceso_regsalida")
     */
    public function registrarsalidaAction(){
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $session = $this->getRequest()->getSession();        
        $accesoId = $session->get('accesoId');
        $entity = $em->getRepository($this->rep)->findOneById($accesoId);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent);
        $entity->setSalidaEl(new \dateTime());
        $em->persist($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('logout'));
    }
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="acceso_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));        
    }
      
//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones", name="acceso_filtrar")
     * @Template()
     */
    public function filtrarAction($msj){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new AccesofiltroType());
        return array('form' => $form->createView(), 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/filtrar/procesar", name="acceso_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new AccesofiltroType());
        $form->bind($request);
        $data = $request->request->get('general_comunbundle_accesofiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $fil = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
     }
        
}   
