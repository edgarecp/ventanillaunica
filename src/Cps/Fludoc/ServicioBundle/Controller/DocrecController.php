<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use Cps\Fludoc\AdmBundle\Entity\Docrec;
use Cps\Fludoc\AdmBundle\Form\DocrecType;
use Cps\Fludoc\AdmBundle\Form\DocrecfiltroType;

/**
 * @Route("/modservicio/docrec")
 */
class DocrecController extends Controller{

    public function __construct(){
        $this->rut = "docrec_serv";
        $this->bun = "CpsFludocAdmBundle";
        $this->ent = "Docrec";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/main/{tipo}", name="docrec_serv")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($tipo){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); 
        $session->set('ord', 'z.id'); $session->set('orddir', 'desc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('id', ''); $session->set('tipoDocrec', $tipo); $session->set('servicioId', $this->get('security.context')->getToken()->getUser()->getId());
        $session->set('rut', $this->rut); $session->set('tit', 'Documentacion Recibida ('.$tipo.')');
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="docrec_serv_listado")
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
        $servicioId = $session->get('servicioId');
        $tipoDocrec = $session->get('tipoDocrec');

        $paginador  = $this->get('knp_paginator');
        $query      = $em->getRepository($this->rep)->findTodos($servicioId, $fil, $tipoDocrec);
        $paginacion = $paginador->paginate($query, $pag, $cxp);
        
        $cantReg  = $em->getRepository($this->rep)->cantRegXServ($servicioId, $tipoDocrec);
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/show/{id}", name="docrec_serv_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id); $servicioId = $session->get('servicioId');
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        $entityDer = $em->getRepository($this->bun.':Derivacion')->findUltima($id, $servicioId);
        $session->set('derivacionId', $entityDer->getId());
        return array('entity' => $entity, 'ultimaDer' => $entityDer, );
    }
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="docrec_serv_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));
    }

//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones", name="docrec_serv_filtrar")
     * @Method("GET")     
     * @Template("CpsFludocAdmBundle:Docrec:filtrar.html.twig")
     */
    public function filtrarAction(){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new DocrecfiltroType());
        return array('form'    => $form->createView(), 'cantReg' => $cantReg, 'vRuta' => $this->rut);
    }
    
    /**
     * @Route("/filtrar/procesar", name="docrec_serv_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new DocrecfiltroType());
        $form->bind($request);
        $data = $request->request->get('cps_fludoc_admbundle_docrecfiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $fil = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }

}
