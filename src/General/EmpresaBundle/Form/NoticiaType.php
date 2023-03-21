<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NoticiaType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('desdeEl', 'genemu_jquerydate', array('label' => 'Desde', 'widget' => 'single_text', 'required' => false, 'format' => 'dd/MM/yyyy'))
            ->add('hastaEl', 'genemu_jquerydate', array('label' => 'Hasta', 'widget' => 'single_text', 'required' => false, 'format' => 'dd/MM/yyyy'))
            ->add('descripcion')
        ;
    }

   public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Noticia'
        ));
    }
    
    public function getName(){
        return 'general_empresabundle_noticiatype';
    }
}
