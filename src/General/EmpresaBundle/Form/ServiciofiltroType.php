<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class ServiciofiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
      $funFil = new Filtrar();
        $builder
            ->add('nombre',      'text', array('required' => false))
            ->add('abreviatura', 'text', array('required' => false))
            ->add('telf',        'text', array('required' => false))
            ->add('telfInterno', 'text', array('required' => false))
            
            ->add('fil_nombre',      'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
            ->add('fil_abreviatura', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
            ->add('fil_telf',        'choice', array('mapped' => false, 'choices' => $funFil->getOpCar() ))
            ->add('fil_telfInterno', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCarN() ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Servicio'
        ));
    }

    public function getName(){
        return 'general_empresabundle_serviciofiltrotype';
    }
}
