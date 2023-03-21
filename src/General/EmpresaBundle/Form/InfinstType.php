<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InfinstType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('descripcion', 'genemu_tinymce')
            ->add('responsable')
        ;
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Infinst'
        ));
    }

    public function getName(){
        return 'general_empresabundle_infinsttype';
    }
}
