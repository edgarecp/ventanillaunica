<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Cps\Fludoc\AdmBundle\Entity\Derivacion;
use Cps\Fludoc\AdmBundle\Form\DerivacionservType;

/**
 * @Route("/modservicio/derivacion")
 */
class DerivacionController extends Controller{
   
    public function __construct(){
        $this->rut = "derivacion_serv";
        $this->bun = "CpsFludocServicioBundle";
        $this->ent = "Derivacion";
        $this->rep = $this->bun.':'.$this->ent;
    }

    /**
     * @Route("/new", name="derivacion_serv_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(){
        $em = $this->getDoctrine()->getManager();
        $session  = $this->getRequest()->getSession(); $id = $session->get('id');
        $entityDR = $em->getRepository('CpsFludocAdmBundle:docrec')->find($id);
        $entity   = new Derivacion();
        $servicio = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new DerivacionservType(array('servicioId' => $servicio->getId())), $entity);
        return array('entity' => $entityDR, 'form'   => $form->createView(),);
    }
    
    /**
     * @Route("/create", name="derivacion_serv_create")
     * @Method("POST")
     * @Template("CpsFludocAdmBundle:Derivacion:new.html.twig")
     */
    public function createAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id'); $derivacionId = $session->get('derivacionId');
        
        $entityDR = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($id);
        if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: Docrec: '.$id);

        $entityEAnt = $em->getRepository('GeneralComunBundle:Estado')->find(3);
        if (!$entityEAnt) throw $this->createNotFoundException('No se encuentra la entidad: Estado: 3');
        $entityE = $em->getRepository('GeneralComunBundle:Estado')->find(1);
        if (!$entityE) throw $this->createNotFoundException('No se encuentra la entidad: Estado: 1');
        
        $entityDAnt = $em->getRepository('CpsFludocAdmBundle:Derivacion')->find($derivacionId);
        if (!$entityDAnt) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$derivacionId);
        $entityDAnt->setEstado($entityEAnt);

        $entity = new Derivacion();
        $entity->setDocrec($entityDR);
        $entity->setFecha(new \dateTime());
        $entity->setEstado($entityE);

        $servicio = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new DerivacionservType(array('servicioId' => $servicio->getId())), $entity);
        
        $form->submit($request);
        if ($form->isValid()) {
            $entityDR->setServicioActual($entity->getServicio());        
            $entityDR->setEstadoActual($entityE);

            $em->persist($entity);
            $em->persist($entityDAnt);
            $em->persist($entityDR);
            $em->flush();
            return $this->redirect($this->generateUrl('docrec_serv', array('tipo' => 'Recep')));
        }
        return array( 'entity' => $entityDR, 'form'   => $form->createView(), );
    }
    
    /**
     * @Route("/recepcion", name="derivacion_serv_recepcion")
     */
    public function recepcionAction(){
        $em = $this->getDoctrine()->getManager();    
        $session = $this->getRequest()->getSession(); $id = $session->get('id'); $derivacionId = $session->get('derivacionId');

        $entityDR = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($id);
        if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: Docrec: '.$id);
        
        $entityE = $em->getRepository('GeneralComunBundle:Estado')->find(2);
        if (!$entityE) throw $this->createNotFoundException('No se encuentra la entidad: Estado: 2');
       
        $entity = $em->getRepository('CpsFludocAdmBundle:Derivacion')->find($derivacionId);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->ent.':'.$derivacionId);
        $entity->setRecepcionEl(new \dateTime());
        $entity->setEstado($entityE);
        $entityDR->setEstadoActual($entityE);
        $em->persist($entity);
        $em->persist($entityDR);
        $em->flush();
        
//        return $this->redirect($this->generateUrl('docrec_serv', array('tipo' => 'XRecep')));
        $session->set('tipoDocrec', 'Recep');
        return $this->redirect($this->generateUrl('docrec_serv_show', array('id' => $id)));
    }
    
    /**
     * @Route("/imprimir/consrecep", name="derivacion_serv_cons_recep")
     * @Method("GET")
     * @Template()
     */
    public function imprimirconsrecepAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $id = $session->get('id'); $derivacionId = $session->get('derivacionId');
        $entityDR = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($id);
        if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: Docrec: '.$id);
        $entity = $em->getRepository('CpsFludocAdmBundle:'.$this->ent)->find($derivacionId);
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad: '.$this->ent.':'.$derivacionId);
        return array('entityDe' => $entity, 'entityDR' => $entityDR, );
    }

}
