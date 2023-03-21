<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstadoType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nombre')
            ->add('abreviatura')
            ->add('tipo', 'choice', array('choices'   => array('D' => 'Derivacion', 'I' => 'Informe'),
                                          'required'  => true, 'expanded' => true)
                 )                        
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Estado'
        ));
    }

    public function getName(){
        return 'general_comunbundle_estadotype';
    }
}
