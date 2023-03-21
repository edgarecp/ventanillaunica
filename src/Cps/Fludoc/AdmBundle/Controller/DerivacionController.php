<?php

namespace Cps\Fludoc\AdmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Cps\Fludoc\AdmBundle\Entity\Derivacion;
use Cps\Fludoc\AdmBundle\Form\DerivacionType;

/**
 * @Route("/adm/derivacion")
 */
class DerivacionController extends Controller{
   
    public function __construct(){
        $this->rut = "adm_derivacion";
        $this->bun = "CpsFludocAdmBundle";
        $this->ent = "Derivacion";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/new", name="adm_derivacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entityDR = $em->getRepository($this->bun.':Docrec')->find($id);
        if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);        
        $entity = new Derivacion();
        $form = $this->createForm(new DerivacionType(), $entity);
        return array('entity' => $entityDR, 'form' => $form->createView(),);
    }

    /**
     * @Route("/create", name="adm_derivacion_create")
     * @Method("POST")
     * @Template("CpsFludocAdmBundle:Derivacion:new.html.twig")
     */
    public function createAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id');
        $entityDR = $em->getRepository($this->bun.':Docrec')->find($id);
        if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        $entityE = $em->getRepository('GeneralComunBundle:Estado')->find(1);
        if (!$entityE) throw $this->createNotFoundException('No se encuentra la entidad: Estado: 1');
        
        $entity = new Derivacion();
        $entity->setDocrec($entityDR);
        $entity->setFecha(new \dateTime());
        $entity->setEstado($entityE);
        $form = $this->createForm(new DerivacionType(), $entity);
        $form->submit($request);
        if ($form->isValid()) {
            $entityDR->setServicioActual($entity->getServicio());
            $entityDR->setEstadoActual($entityE);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->persist($entityDR);
            $em->flush();
            return $this->redirect($this->generateUrl( 'adm_docrec_show', array('id' => $id)));
        }
        return array( 'entity' => $entityDR, 'form' => $form->createView(), );
    }
    
    /**
     * @Route("/delete/{id}", name="adm_derivacion_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($this->rep)->find($id);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$id);
        $entityDR = $entity->getDocRec();
        $entityDR->setEstadoActual(null);
        $entityDR->setServicioActual(null);
        $em->persist($entityDR);
        $em->remove($entity);
        $em->flush();       
        return $this->redirect($this->generateUrl( 'adm_docrec_show', array('id' => $entityDR->getId() )));
    }
    
}
