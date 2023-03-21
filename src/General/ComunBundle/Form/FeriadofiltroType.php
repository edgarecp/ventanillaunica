<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use General\ComunBundle\Libreria\Filtrar;

class FeriadofiltroType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
      $funFil = new Filtrar();
      $builder
            ->add('fecha', 'date', array('widget' => 'single_text', 'format'=>'yyyy-MM-dd', 'required' => false))
            ->add('mombre', 'text', array('required' => false))
            
            ->add('fil_fecha',  'choice', array('mapped' => false, 'choices' => $funFil->getOp() ))
            ->add('fil_nombre', 'choice', array('mapped' => false, 'choices' => $funFil->getOpCar()))
         ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Feriado'
        ));
    }

    public function getName(){
        return 'general_comunbundle_feriadofiltrotype';
    }
}
