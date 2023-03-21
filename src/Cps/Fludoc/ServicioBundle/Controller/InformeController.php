<?php

namespace Cps\Fludoc\ServicioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Cps\Fludoc\ServicioBundle\Entity\Informe;
use Cps\Fludoc\ServicioBundle\Form\InformeType;

/**
 * @Route("/modservicio/informe")
 */
class InformeController extends Controller{
   
    public function __construct(){
        $this->bun = "CpsFludocServicioBundle";
        $this->ent = "Informe";
        $this->rep = $this->bun.':'.$this->ent;
        $this->entDe = "Derivacion";
        $this->repDe = 'CpsFludocAdmBundle:'.$this->entDe;
    }

    /**
     * @Route("/new", name="informe_new")
     * @Template()
     */
    public function newAction(){     
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession(); $session->set('accion', 'new'); $derivacionId = $session->get('derivacionId');
        $entityDe = $em->getRepository($this->repDe)->find($derivacionId);
        if (!$entityDe) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->entDe.':'.$derivacionId);
        $entity = new Informe();
        $entity->setDerivacion($entityDe);
        $form = $this->createForm(new InformeType(), $entity);
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

    /**
     * @Route("/create", name="informe_create")
     * @Method("POST")
     * @Template("CpsFludocServicioBundle:Informe:new.html.twig")
     */
    public function createAction(Request $request){
        $em = $this->getDoctrine()->getManager();    
        $session = $this->getRequest()->getSession(); $derivacionId = $session->get('derivacionId'); $docrecId = $session->get('id');
        $entityDe = $em->getRepository($this->repDe)->find($derivacionId);
        if (!$entityDe) throw $this->createNotFoundException('No se encuentra la entidad:'.$this->entDe.':'.$derivacionId);
        $entity  = new Informe();
        $entity->setDerivacion($entityDe);    
        $entity->setCreadoEl(new \dateTime());
        $form = $this->createForm(new InformeType(), $entity);
        $form->bind($request);
        if ($form->isValid()){
            $entityDR = $em->getRepository('CpsFludocAdmBundle:Docrec')->find($docrecId);
            if (!$entityDR) throw $this->createNotFoundException('No se encuentra la entidad: Docrec: '.$docrecId);
            $entityDR->setEstadoActual($entity->getEstado());    
            $em->persist($entity);
            $em->persist($entityDR);
            $em->flush();
            return $this->redirect($this->generateUrl('docrec_serv_show', array('id' => $docrecId)));
        }
        return array('entity' => $entity, 'form' => $form->createView(), );
    }

}
