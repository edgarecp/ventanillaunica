<?php

namespace Cps\Fludoc\AdmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use General\ComunBundle\Libreria\Filtrar;
use Cps\Fludoc\AdmBundle\Entity\Docrec;
use Cps\Fludoc\AdmBundle\Form\DocrecType;
use Cps\Fludoc\AdmBundle\Form\DocrecfiltroType;
use General\ComunBundle\Libreria\Pin;
use Cps\Fludoc\AdmBundle\Entity\Derivacion;
use Cps\Fludoc\AdmBundle\Form\DerivacionType;

/**
 * @Route("/adm/docrec")
 */
class DocrecController extends Controller{
   
    public function __construct(){
        $this->rut = "adm_docrec";
        $this->bun = "CpsFludocAdmBundle";
        $this->ent = "Docrec";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/", name="adm_docrec")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); 
        $session->set('ord', 'z.id'); $session->set('orddir', 'desc'); $session->set('fil', ' '); $session->set('pag', 1); $session->set('cxp', 20);
        $session->set('id', '');
        $session->set('rut', $this->rut); $session->set('tit', 'Documentacion Recibida');
        $ord = $session->get('ord'); $orddir = $session->get('orddir');
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $ord, 'orddir' => $orddir)));
    }
    
    /**
     * @Route("/listado", name="adm_docrec_listado")
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
        $query      = $em->getRepository($this->rep)->findTodos1($fil);
        $paginacion = $paginador->paginate($query, $pag, $cxp);
        
        $cantReg  = $em->getRepository($this->rep)->cantReg($this->rep);

        return array('paginacion' => $paginacion, 'cantReg' => $cantReg, );
    }

    /**
     * @Route("/show/{id}", name="adm_docrec_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id);
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }
    
    /**
     * @Route("/new", name="adm_docrec_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(){
        $entity = new Docrec();
        $entity->setRecepcionEl(new \dateTime());
        $entity->setFechaDoc(new \dateTime());
        $entity->setFolio(1);
        $form   = $this->createForm(new DocrecType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(),);
    }
    
    /**
     * @Route("/create", name="adm_docrec_create")
     * @Method("POST")
     * @Template("CpsFludocAdmBundle:Docrec:new.html.twig")
     */
    public function createAction(Request $request){
        $entity = new Docrec();
        $form = $this->createForm(new DocrecType(), $entity);
        $form->submit($request);
        if ($form->isValid()) {
            $clave  = new Pin();
            $entity->setPin($clave->getPinMin(5));
            $entity->setUsuario($this->get('security.context')->getToken()->getUser());
            // Copiar el archivo subido y guardar la ruta
            $entity->subirArchivo($this->container->getParameter('general.directorio.archivos').$this->ent."/");

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $entity->getId())));
        }
        return array( 'entity' => $entity, 'form'   => $form->createView(), );
    }

    /**
     * @Route("/edit/{id}", name="adm_docrec_edit")
     * @Method("GET")
     * @Template("CpsFludocAdmBundle:Docrec:new.html.twig")
     */
    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('id', $id); $session->set('accion', 'edit');
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        $entity->setArchivo(new File($entity->getArchivo(), false));
        $form = $this->createForm(new DocrecType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/update", name="adm_docrec_update")
     * @Method("POST")
     * @Template("CpsFludocAdmBundle:Docrec:new.html.twig")
     */
    public function updateAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        
        $archivoOriginal = $entity->getArchivo();
        $entity->setArchivo(new File($archivoOriginal, false));
        $entity->setModificadoEl(new \dateTime());
        
        $form = $this->createForm(new DocrecType(), $entity);
        $form->submit($request);
        if ($form->isValid()) {
            if (null == $entity->getArchivo()){
                // el usuario no ha modificado el archivo original
                $entity->setArchivo($archivoOriginal);
            }else{
                // el usuario ha modificado el archivo: copiar el archivo subido y guardar la nueva ruta
                $entity->subirArchivo($this->container->getParameter('general.directorio.archivos').$this->ent."/");
                // borrar el archivo anterior
                if (!empty($archivoOriginal)) {
                    $fs = new Filesystem();
                    $fs->remove($this->container->getParameter('general.directorio.archivos').$this->ent."/".$archivoOriginal);
                }
            }
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl($this->rut.'_show', array('id' => $id)));
        }
        return array( 'entity' => $entity, 'form' => $form->createView(),);
    }
    
    /**
     * @Route("/delete/{id}", name="adm_docrec_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        $archivo = $entity->getArchivo();
        if (!empty($archivo)) {
           $fs = new Filesystem();
           $fs->remove($this->container->getParameter('general.directorio.archivos').$this->ent."/".$archivo);
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirect($this->generateUrl($this->rut.'_listado'));
    }
    
    /**
     * @Route("/grabarSesion/{var}/{val}", name="adm_docrec_grabarSesion")
     */
    public function grabarSesion($var, $val){
        $session = $this->getRequest()->getSession();
        $session->set($var, $val);
        if ($var == 'cxp')  $session->set('pag', 1);
        return $this->redirect($this->generateUrl($this->rut.'_listado', array('ord' => $session->get('ord'), 'orddir' => $session->get('orddir'))));
    }
    
    /**
     * @Route("/imprimir/hojaruta", name="adm_docrec_imprimir_hojaruta")
     * @Method("GET")
     * @Template()
     */
    public function imprimirhojarutaAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entity = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }

    /**
     * @Route("/imprimir/colilla", name="adm_docrec_imprimir_colilla")
     * @Method("GET")
     * @Template()
     */
    public function imprimircolillaAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entity = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        return array('entity' => $entity,);
    }    
    

//================================= FILTRAR ==========================================
    
    /**
     * @Route("/filtrar/opciones", name="adm_docrec_filtrar")
     * @Method("GET")     
     * @Template()
     */
    public function filtrarAction(){
        $em = $this->getDoctrine()->getManager();
        $cantReg  = $em->getRepository($this->rep)->cantReg();
        $form   = $this->createForm(new DocrecfiltroType());
        return array('form' => $form->createView(), 'cantReg' => $cantReg, );
    }
    
    /**
     * @Route("/filtrar/procesar", name="adm_docrec_procesarfiltro")
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
