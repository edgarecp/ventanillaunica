<?php

namespace Cps\Fludoc\ServicioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformeType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('detalle')
            ->add('estado', null, array('empty_value' => 'Elija uno(a)...', 
                                         'query_builder' => function(\Doctrine\ORM\EntityRepository $repositorio) {
                                                            return $repositorio->createQueryBuilder('c')
                                                            ->where("c.tipo='I'");
                                                            },
                                        )
                 )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'Cps\Fludoc\ServicioBundle\Entity\Informe'
        ));
    }
    
    public function getName(){
        return 'cps_fludoc_serviciobundle_informetype';
    }
}
