<?php

namespace Cps\Fludoc\AdmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class DocrecfiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $funFil = new Filtrar();
        $builder
            ->add('id',             'text', array('required' => false))
            ->add('recepcionEl',    'genemu_jquerydate', array('label' => 'Recepcion', 'widget' => 'single_text', 'required' => false, 'format' => 'dd/MM/yyyy'))
            ->add('fechaDoc',       'text', array('label' => 'Ingreso', 'required' => false))
            ->add('cite',           'text', array('required' => false))
            ->add('referencia',     'text', array('required' => false))
            ->add('institucionRem', 'text', array('required' => false))
            ->add('personaRem',     'text', array('required' => false))
            ->add('cargoRem',       'text', array('required' => false))
            ->add('folio',          'text', array('required' => false))
            ->add('servicioActual', 'entity', array('class' => 'GeneralEmpresaBundle:Servicio', 
                                              'empty_value' => 'Todos...', 'required' => false))
            ->add('estadoActual',   'entity', array('class' => 'GeneralComunBundle:Estado', 
                                              'empty_value' => 'Todos...', 'required' => false))

            ->add('fil_id',             'choice', array('mapped' => false, 'choices' => $funFil->getOp() ))
            ->add('fil_recepcionEl',    'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_fechaDoc',       'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_cite',           'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_referencia',     'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_institucionRem', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_personaRem',     'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_cargoRem',       'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_folio',          'choice', array('mapped' => false, 'choices' => $funFil->getOp() ))
            ->add('fil_servicioActual', 'choice', array('mapped' => false, 'choices' => $funFil->getOpEnt() ))
            ->add('fil_estadoActual',   'choice', array('mapped' => false, 'choices' => $funFil->getOpEnt() ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Cps\Fludoc\AdmBundle\Entity\Docrec'
        ));
    }
    
    public function getName(){
        return 'cps_fludoc_admbundle_docrecfiltrotype';
    }
}
