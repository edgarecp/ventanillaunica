<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nombre')
            ->add('abreviatura')
            ->add('direccion')
            ->add('foto', 'file', array('required' => false))
            ->add('ipMaqCli')
        ;
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Sucursal'
        ));
    }

    public function getName(){
        return 'general_empresabundle_sucursaltype';
    }
    
}
