<?php

namespace Cps\Fludoc\AdmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocrecType extends AbstractType{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('recepcionEl', 'datetime', array('date_widget' => 'single_text', 'time_widget' => 'single_text') )
            ->add('fechaDoc',    'genemu_jquerydate', array('label' => 'Fecha Doc', 'widget' => 'single_text', 'required' => false ))
            ->add('cite')            
            ->add('referencia')
            ->add('institucionRem')
            ->add('personaRem')
            ->add('cargoRem')
            ->add('folio')
            ->add('archivo', 'file', array('required' => false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Cps\Fludoc\AdmBundle\Entity\Docrec'
        ));
    }

    /**
     * @return string
     */
    public function getName(){
        return 'cps_fludoc_admbundle_docrectype';
    }
}
