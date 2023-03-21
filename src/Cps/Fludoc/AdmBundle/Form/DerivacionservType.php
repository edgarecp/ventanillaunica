<?php

namespace Cps\Fludoc\AdmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DerivacionservType extends AbstractType{

    public function __construct(array $options = array()){
        $this->servicioId = isset($options['servicioId']) ? (int) $options['servicioId'] : null;
    }

    public function buildForm(FormBuilderInterface $builder, array $options){
        $servicioId = $this->servicioId;
        $builder
            //->add('servicio', null, array('empty_value' => 'Elija uno(a)...', 
            //                             'query_builder' => function(\Doctrine\ORM\EntityRepository $repositorio) use ($servicioId) {
            //                                                return $repositorio->createQueryBuilder('c')
            //                                                ->where('c.id!='.$servicioId);
            //                                                },
            //                            )
            //     )
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
        return 'cps_fludoc_admbundle_derivacionservtype';
    }
}
