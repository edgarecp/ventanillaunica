<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class AccesofiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $funFil = new Filtrar();
        $builder
            ->add('usuario', 'entity', array('class' => 'General\ComunBundle\Entity\Usuario',
                                              'empty_value' => 'Todos...', 'required' => false 
                                            ))
            ->add('maquina',     null, array('required' => false))                                                             
            ->add('ingresoEl', 'datetime', array('widget' => 'single_text', 'label' => 'Ingreso', 'required' => false))
            ->add('salidaEl',  'datetime', array('widget' => 'single_text', 'label' => 'Salida', 'required' => false))
                             
            ->add('fil_usuario',   'choice', array('mapped' => false, 'choices' => $funFil->getOpEnt()))
            ->add('fil_maquina',   'choice', array('mapped' => false, 'choices' => $funFil->getOpCar()))
            ->add('fil_ingresoEl', 'choice', array('mapped' => false, 'choices' => $funFil->getOp()))
            ->add('fil_salidaEl',  'choice', array('mapped' => false, 'choices' => $funFil->getOpN()))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Acceso'
        ));
    }
    
    public function getName(){
        return 'general_comunbundle_accesofiltrotype';
    }
}
