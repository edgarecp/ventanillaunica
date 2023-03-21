<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class NoticiafiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $funFil = new Filtrar();
        $builder
            ->add('desdeEl', 'datetime', array('widget' => 'single_text', 'label' => 'Inicio', 'required' => false))
            ->add('hastaEl', 'datetime', array('widget' => 'single_text', 'label' => 'Final', 'required' => false))
            ->add('descripcion', 'text', array('required' => false))
            
            ->add('fil_desdeEl',     'choice', array('mapped' => false, 'choices' => $funFil->getOp() ))
            ->add('fil_hastaEl',     'choice', array('mapped' => false, 'choices' => $funFil->getOp() ))
            ->add('fil_descripcion', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCar(), 'preferred_choices' => array('LIKE') ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Noticia'
        ));
    }

    public function getName(){
        return 'general_empresabundle_noticiafiltrotype';
    }
}
