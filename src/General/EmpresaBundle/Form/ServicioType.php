<?php

namespace General\EmpresaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServicioType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nombre')
            ->add('abreviatura')
            ->add('telf')
            ->add('telfInterno')
            ->add('login')
        ;
        // El formulario es diferente según se utilice en la acción 'new' o en la acción 'edit'
        // Para determinar en qué acción estamos, se comprueba si el atributo `id` del objeto
        // es null, en cuyo caso estamos en la acción 'new'
        if (null == $options['data']->getId())
            $builder->add('password', 'repeated', array('type' => 'password',
                                                'invalid_message' => 'Los password deben ser iguales...',
                                                'required' => true,
                                                'first_options'  => array('label' => 'Ingresar Clave'),
                                                'second_options' => array('label' => 'Repetir Clave'),
                 ));
        else
            $builder->add('password', 'repeated', array('type' => 'password',
                                                'invalid_message' => 'Los password deben ser iguales...',
                                                'required' => false,
                                                'first_options'  => array('label' => 'Ingresar Clave'),
                                                'second_options' => array('label' => 'Repetir Clave'),
                 ));
        ;
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\EmpresaBundle\Entity\Servicio'
        ));
    }

    public function getName(){
        return 'general_empresabundle_serviciotype';
    }
    
}
