<?php

namespace Cps\Fludoc\AdmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DerivacionType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            //->add('servicio', null, array('empty_value' => 'Elija uno(a)...'))
            ->add('servicio', 'genemu_jqueryselect2_entity', array('empty_value' => '',
                    'class' => 'General\EmpresaBundle\Entity\Servicio',
                    'property' => 'nombre',
                    'configs' => array('minimumInputLength' => 1),
                 ))    
            ->add('observacion')
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Cps\Fludoc\AdmBundle\Entity\Derivacion'
        ));
    }

    public function getName(){
        return 'cps_fludoc_admbundle_derivaciontype';
    }
}
