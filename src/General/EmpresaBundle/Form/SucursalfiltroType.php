<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class SucursalfiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
      $funFil = new Filtrar();
        $builder
            ->add('nombre',      'text', array('required' => false))
            ->add('abreviatura', 'text', array('required' => false))
            ->add('direccion',   'text', array('required' => false))
            ->add('ipMaqCli',    'text', array('required' => false))
            
            ->add('fil_nombre',      'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
            ->add('fil_abreviatura', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
            ->add('fil_direccion',   'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
            ->add('fil_ipMaqCli',    'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Sucursal'
        ));
    }

    public function getName(){
        return 'general_empresabundle_sucursalfiltrotype';
    }
}
