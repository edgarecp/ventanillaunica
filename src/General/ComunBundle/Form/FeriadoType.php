<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FeriadoType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('fecha', 'genemu_jquerydate', array('label' => 'Fecha', 'widget' => 'single_text', 'format' => 'dd/MM/yyyy', 'attr' => array( 'buttonImageOnly' => 'yes')))
            ->add('tipo')
            ->add('nombre')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Feriado'
        ));
    }

    public function getName(){
        return 'general_comunbundle_feriadotype';
    }
}
