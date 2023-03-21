<?php

namespace General\EmpresaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use General\EmpresaBundle\Entity\Infinst;
use General\EmpresaBundle\Form\InfinstType;

/**
 * Contactenos controller.
 *
 * @Route("/geem_infinst")
 */
class InfinstController extends Controller{

    /**
     * @Route("/", name="infinst")
     * @Template()
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GeneralEmpresaBundle:Infinst')->find('1');
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Infinst.');
        $form = $this->createForm(new InfinstType(), $entity);
        return array('entity' => $entity, 'form'   => $form->createView(), );
    }

    /**
     * @Route("/update", name="infinst_update")
     * @Method("POST")
     * @Template("GeneralEmpresaBundle:Infinst:index.html.twig")
     */
    public function updateAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('GeneralEmpresaBundle:Infinst')->find('1');
        if (!$entity) throw $this->createNotFoundException('No se encuentra la entidad Infinst.');
        $form   = $this->createForm(new InfinstType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
        }
        return array('entity' => $entity, 'form'   => $form->createView(), );
    }
    
}
