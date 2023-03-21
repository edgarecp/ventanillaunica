<?php

namespace General\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use General\EmpresaBundle\Entity\Noticia;
use General\EmpresaBundle\Form\NoticiaType;
use General\EmpresaBundle\Form\NoticiafiltroType;

/**
 * @Route("/noticia")
 */
class NoticiaController extends Controller{

    public function __construct(){
        $this->rut = "noticia";
        $this->bun = "GeneralEmpresaBundle";
        $this->ent = "Noticia";
        $this->rep = $this->bun.':'.$this->ent;
    }
    
    /**
     * @Route("/index", name="noticia")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.id'); $session->set('orddir', 'desc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', $this->ent);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="noticia_listado")
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
        
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    /**
     * @Route("/show/{id}", name="noticia_show")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }

    /**
     * @Route("/new", name="noticia_new")
     * @Template()
     */
    public function newAction(){
        $entity = new Noticia();
        $entity->setDesdeel(new \dateTime());
        $entity->setHastael(new \dateTime());
        $form   = $this->createForm(new NoticiaType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/create", name="noticia_create")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Noticia:new.html.twig")
     */
    public function createAction(Request $request){
        $entity  = new Noticia();
        $entity->setCreadoEl(new \dateTime());
        $entity->setUsuario($this->get('security.context')->getToken()->getUser());
        $form    = $this->createForm(new NoticiaType(), $entity);
        $form->bind($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $entity->getId())));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/edit/{id}", name="noticia_edit")
     * @Template("GeneralEmpresaBundle:Noticia:new.html.twig")
     */
    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id);
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        $form = $this->createForm(new NoticiaType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/update/{id}", name="noticia_update")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Noticia:new.html.twig")
     */
    public function updateAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$id);
        $form   = $this->createForm(new NoticiaType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $id)));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/delete/{id}", name="noticia_delete")
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
     * @Route("/grabarSesion/{var}/{val}", name="noticia_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));        
    }
       
//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones", name="noticia_filtrar")
     * @Template()
     */
    public function filtrarAction($msj){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();        
        $form   = $this->createForm(new NoticiafiltroType());
        return array('form' => $form->createView(), 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/filtrar/procesar", name="noticia_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new NoticiafiltroType());
        $form->bind($request);
        $data = $request->request->get('general_empresabundle_noticiafiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $fil = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }
    
}
