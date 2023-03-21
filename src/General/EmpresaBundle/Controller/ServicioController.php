<?php

namespace General\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use General\EmpresaBundle\Entity\Servicio;
use General\EmpresaBundle\Form\ServicioType;
use General\EmpresaBundle\Form\ServiciofiltroType;

use General\ComunBundle\Form\CambiarpasswordType;
use General\ComunBundle\Entity\Cambiarpassword;

/**
 * @Route("/servicio")
 */
class ServicioController extends Controller{
   
    public function __construct(){
        $this->rut = "servicio";
        $this->bun = "GeneralEmpresaBundle";
        $this->ent = "Servicio";
        $this->rep = $this->bun.':'.$this->ent;
    }
    
    /**
     * @Route("/index", name="servicio")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.nombre'); $session->set('orddir', 'asc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', $this->ent);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="servicio_listado")
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
        $query      = $em->getRepository($this->rep)->findTodos($this->rep, $fil);
        $paginacion = $paginador->paginate($query, $pag, $cxp);
        
        $cantReg  = $em->getRepository($this->rep)->cantReg($this->rep);        
        
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    /**
     * @Route("/show/{id}", name="servicio_show")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        return array('entity' => $entity, );
    }

    /**
     * @Route("/new", name="servicio_new")
     * @Template()
     */
    public function newAction(){
        $entity = new Servicio();
        $entity->setPassword('servicio123');
        $form   = $this->createForm(new ServicioType(), $entity);
        $session = $this->getRequest()->getSession(); $session->set('accion', 'new');
        return array('entity' => $entity, 'form' => $form->createView(), );
    }
    
    private function getPasswordCodificado($entity, $password){
        $encoder = $this->get('security.encoder_factory')->getEncoder($entity);
        $passwordCodificado = $encoder->encodePassword($password, $entity->getSalt());
        return $passwordCodificado;
    }        

    /**
     * @Route("/create", name="servicio_create")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Servicio:new.html.twig")
     */
    public function createAction(Request $request){
        $entity  = new Servicio();
        $form    = $this->createForm(new ServicioType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $entity->setPassword($this->getPasswordCodificado($entity, $entity->getPassword()));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $entity->getId())));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/edit/{id}", name="servicio_edit")
     * @Template("GeneralEmpresaBundle:Servicio:new.html.twig")
     */
    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id);
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Servicio:'.$this->ent.':'.$id);
        $form = $this->createForm(new ServicioType(), $entity);
        $session = $this->getRequest()->getSession(); $session->set('accion', 'edit');
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/update", name="servicio_update")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Servicio:new.html.twig")
     */
    public function updateAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Servicio:'.$this->ent.':'.$id);
        $form   = $this->createForm(new ServicioType(), $entity);
        $actual_pass = $entity->getPassword();
        $form->bind($request);
        if ($form->isValid()) {
            if ($entity->getPassword() == null)
                $entity->setPassword($actual_pass);
            else
                $entity->setPassword($this->getPasswordCodificado($entity, $entity->getPassword()));
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $id)));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/delete/{id}", name="servicio_delete")
     */
    public function deleteAction($id){
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository($this->rep)->find($id);
       if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Servicio:'.$this->ent.':'.$id);
       $em->remove($entity);
       $em->flush();
       return $this->redirect($this->generateUrl($this->rut.'_listado'));
    }
   
    /**
     * @Route("/grabarSesion/{var}/{val}", name="servicio_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));        
    }
    
    /**
     * @Route("/cambPass", name="servicio_cambpass")
     * @Template()
     */
    public function cambpassAction(){
        $entityCP = new Cambiarpassword();
        $form     = $this->createForm(new CambiarpasswordType(), $entityCP);
        return array('entity' => $entityCP, 'form' => $form->createView(), 'vRuta' => $this->rut);
    }
    
    /**
     * @Route("/cambpassupdate", name="servicio_cambpass_update")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Servicio:cambpass.html.twig")
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
            return $this->redirect($this->generateUrl('acceso_regsalida'));
        }
        return array('entity' => $entityCP, 'form' => $form->createView(), 'vRuta' => $this->rut);
    }
    
//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones", name="servicio_filtrar")
     * @Template()
     */
    public function filtrarAction(){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg($this->rep);
        $form   = $this->createForm(new ServiciofiltroType());
        return array('form' => $form->createView(), 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/filtrar/procesar", name="servicio_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new ServiciofiltroType());
        $form->bind($request);
        $data = $request->request->get('general_empresabundle_serviciofiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $fil = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }

}
