<?php

namespace General\ComunBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use General\ComunBundle\Entity\Estado;
use General\ComunBundle\Form\EstadoType;

/**
 * @Route("/geco/estado")
 */
class EstadoController extends Controller{

    public function __construct(){
        $this->rut = "geco_estado";
        $this->bun = "GeneralComunBundle";
        $this->ent = "Estado";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/index", name="geco_estado")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.id'); $session->set('orddir', 'asc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', $this->ent);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }

    /**
     * @Route("/listado", name="geco_estado_listado")
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
        $entities   = $em->getRepository($this->rep)->findTodos($fil, $this->rep);
        $paginacion = $paginador->paginate($entities, $pag, $cxp);
        
        $cantReg  = $em->getRepository($this->rep)->cantReg($this->rep);
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    /**
     * @Route("/show/{id}", name="geco_estado_show")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }

    /**
     * @Route("/new", name="geco_estado_new")
     * @Template()
     */
    public function newAction(){
        $entity = new Estado();
        $form   = $this->createForm(new EstadoType(), $entity);
        return array('entity' => $entity, 'form'   => $form->createView(),);
    }

    /**
     * @Route("/create", name="geco_estado_create")
     * @Method("POST")
     * @Template("GeneralComunBundle:Estado:new.html.twig")
     */
    public function createAction(Request $request){
        $entity  = new Estado();
        $form    = $this->createForm(new EstadoType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $entity->getId())));     
        }
        return array('entity' => $entity, 'form'   => $form->createView(), );
    }

    /**
     * @Route("/edit/{id}", name="geco_estado_edit")
     * @Template("GeneralComunBundle:Estado:new.html.twig")
     */
    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id);
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        $form = $this->createForm(new EstadoType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/update", name="geco_estado_update")
     * @Method("POST")
     * @Template("GeneralComunBundle:Estado:new.html.twig")
     */
    public function updateAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        $form   = $this->createForm(new EstadoType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $id)));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/delete/{id}", name="geco_estado_delete")
     */
    public function deleteAction($id){
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository($this->rep)->find($id);
       if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
       $em->remove($entity);
       $em->flush();
       return $this->redirect($this->generateUrl($this->rut.'_listado'));
    }
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="geco_estado_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }
      
}
