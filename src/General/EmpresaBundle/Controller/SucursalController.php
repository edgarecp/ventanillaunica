<?php

namespace General\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use General\EmpresaBundle\Entity\Sucursal;
use General\EmpresaBundle\Form\SucursalType;
use General\EmpresaBundle\Form\SucursalfiltroType;

/**
 * @Route("/geem_sucursal")
 */
class SucursalController extends Controller{
   
    public function __construct(){
        $this->rut = "sucursal";
        $this->bun = "GeneralEmpresaBundle";
        $this->ent = "Sucursal";
        $this->rep = $this->bun.':'.$this->ent;
    }
    
    /**
     * @Route("/index", name="sucursal")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('ord', 'z.nombre'); $session->set('orddir', 'asc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('rut', $this->rut); $session->set('tit', $this->ent);
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="sucursal_listado")
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
        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    /**
     * @Route("/show/{id}", name="sucursal_show")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }

    /**
     * @Route("/new", name="sucursal_new")
     * @Template()
     */
    public function newAction(){
        $entity = new Sucursal();
        $form   = $this->createForm(new SucursalType(), $entity);
        $session = $this->getRequest()->getSession(); $session->set('accion', 'new');
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/create", name="sucursal_create")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Sucursal:new.html.twig")
     */
    public function createAction(Request $request){
        $entity  = new Sucursal();
        $form    = $this->createForm(new SucursalType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            // Copiar la foto subida y guardar la ruta
            $entity->subirFoto($this->container->getParameter('general.directorio.archivos').$this->ent."/");

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $entity->getId())));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/edit/{id}", name="sucursal_edit")
     * @Template("GeneralEmpresaBundle:Sucursal:new.html.twig")
     */
    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id);
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        $entity->setFoto(new File($entity->getFoto(), false));
        $form = $this->createForm(new SucursalType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/update/{id}", name="sucursal_update")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Sucursal:new.html.twig")
     */
    public function updateAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);

        $fotoOriginal = $entity->getFoto();
        $entity->setFoto(new File($fotoOriginal, false));

        $form   = $this->createForm(new SucursalType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            if (null == $entity->getFoto()) {
                    // el usuario no ha modificado la foto original
                    $entity->setFoto($fotoOriginal);
            } else {
                // el usuario ha modificado la foto: copiar la foto subida y guardar la nueva ruta
                $entity->subirFoto($this->container->getParameter('general.directorio.archivos').$this->ent."/");
                // borrar la foto anterior
                if (!empty($fotoOriginal)) {
                    $fs = new Filesystem();
                    $fs->remove($this->container->getParameter('general.directorio.archivos').$this->ent."/".$fotoOriginal);
                }
            }
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $id)));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/delete/{id}", name="sucursal_delete")
     */
    public function deleteAction($id){
       $em = $this->getDoctrine()->getManager();
       $entity = $em->getRepository($this->rep)->find($id);
       if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
       $foto = $entity->getFoto();
       if (!empty($foto)) {
          $fs = new Filesystem();
          $fs->remove($this->container->getParameter('general.directorio.archivos').$this->ent."/".$foto);
       }
       $em->remove($entity);
       $em->flush();
       return $this->redirect($this->generateUrl($this->rut.'_listado'));
    }
   
    /**
     * @Route("/grabarSesion/{var}/{val}", name="sucursal_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));        
    }
    
//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones/{msj}", name="sucursal_filtrar", defaults={"msj"=""})
     * @Template()
     */
    public function filtrarAction($msj){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new SucursalfiltroType());
        return array('form' => $form->createView(), 'msj' => $msj, 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/filtrar/procesar", name="sucursal_procesarfiltro")
     * @Method("POST")
     */
    public function procesarfiltroAction(Request $request){
        $form = $this->createForm(new SucursalfiltroType());
        $form->bind($request);
        $data = $request->request->get('general_empresabundle_sucursalfiltrotype');
        $fil = " ";
        if ($data != null){
            $funFil = new Filtrar();
            $fil = $funFil->convertirACadena($data);
        }
        return $this->redirect($this->generateUrl($this->rut.'_grabarSesion', array('var' => 'fil', 'val' => $fil)));
    }
    
}
