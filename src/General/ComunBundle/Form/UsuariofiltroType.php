<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class UsuariofiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $funFil = new Filtrar();
        $builder
            ->add('nombre',  'text', array('required' => false))
            ->add('perfil', null, array('required' => false))
            ->add('ingresoEl', 'text', array('required' => false))                        
            ->add('retiroEl',  'text', array('required' => false))
            ->add('email',     'text', array('required' => false))
                             
            ->add('fil_nombre',    'choice', array('mapped' => false, 'choices' => $funFil->getOpCar()))
            ->add('fil_perfil',    'choice', array('mapped' => false, 'choices' => $funFil->getOpEnt()))            
            ->add('fil_ingresoEl', 'choice', array('mapped' => false, 'choices' => $funFil->getOp()))
            ->add('fil_retiroEl',  'choice', array('mapped' => false, 'choices' => $funFil->getOp()))
            ->add('fil_alias',     'choice', array('mapped' => false, 'choices' => $funFil->getOpCar()))
            ->add('fil_email',     'choice', array('mapped' => false, 'choices' => $funFil->getOpCar()))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Usuario'
        ));
    }
    
    public function getName(){
        return 'general_comunbundle_usuariofiltrotype';
    }
}
