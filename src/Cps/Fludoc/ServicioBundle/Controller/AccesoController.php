<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Cps\Fludoc\ServicioBundle\Entity\Acceso;
use General\ComunBundle\Libreria\Filtrar;
use Cps\Fludoc\ServicioBundle\Form\AccesofiltroType;

/**
 * @Route("/modservicio/acceso")
 */
class AccesoController extends Controller{
    private $rut;
   
    public function __construct(){
        $this->rut = "acceso";
        $this->bun = "CpsFludocServicioBundle";
        $this->ent = "Acceso";
        $this->rep = $this->bun.':'.$this->ent;
    }
    
    /**
     * @Route("/index", name="acceso_serv")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 't.ingresoEl'); $session->set('orddir', 'desc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="acceso_listado_serv")
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
        $entities   = $em->getRepository($this->rep)->findTodos($fil);
        $paginacion = $paginador->paginate($entities, $pag, $cxp);
        
        if ($paginacion->getTotalItemCount() == 0 and $fil != ' ')
            return $this->redirect($this->generateUrl($this->rut.'_filtrar', array('msj' => 'No existen Registros...')));

        $cantReg  = $em->getRepository($this->rep)->cantReg();
        return array('paginacion' => $paginacion,
                     'cantReg'    => $cantReg,
                    );
    }
    
    /**
     * @Route("/registraringreso", name="acceso_regingreso_serv")
     */
    public function registraringresoAction(){
        $entity  = new Acceso();
        $em = $this->getDoctrine()->getManager();
        $entity->setServicio($this->get('security.context')->getToken()->getUser());
        $entity->setMaquina($this->getRequest()->getClientIp());
        $em->persist($entity);
        $em->flush();
        $session = $this->getRequest()->getSession();
        $session->set('accesoId', $entity->getId());
        $session->set('modulo', 'CpsFludocServicioBundle');
        return $this->redirect($this->generateUrl('main_serv'));
    }

    /**
     * @Route("/registrarsalida", name="acceso_regsalida_serv")
     */
    public function registrarsalidaAction(){
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->get('security.context')->getToken()->getUser();
        $session = $this->getRequest()->getSession();
        $accesoId = $session->get('accesoId');
        $entity = $em->getRepository($this->rep)->findOneById($accesoId);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Acceso.');
        $entity->setSalidaEl(new \dateTime());
        $em->persist($entity);
        $em->flush();
        return $this->redirect($this->generateUrl('logout_serv'));
    }
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="acceso_grabarSesion_serv")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));
    }
      
//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones/{msj}", name="acceso_filtrar_serv", defaults={"msj"=""})
     * @Template()
     */
    public function filtrarAction($msj){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new AccesofiltroType());
        return array('form'    => $form->createView(),
                     'msj'     => $msj, 
                     'cantReg' => $cantReg
                    );
    }
    
    /**
     * @Route("/filtrar/procesar", name="acceso_procesarfiltro_serv")
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
