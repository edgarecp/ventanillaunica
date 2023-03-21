<?php

namespace General\ComunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CambiarpasswordType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('oldPassword', 'password', array('label' => 'Clave Actual'));
        $builder->add('newPassword', 'repeated', array('type' => 'password',
                                                       'invalid_message' => 'Las Claves deben ser iguales...',
                                                       'required' => true,
                                                       'first_options'  => array('label' => 'Ingresar Clave'),
                                                       'second_options' => array('label' => 'Repetir Clave'),
                     ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'General\ComunBundle\Entity\Cambiarpassword',
        ));
    }
    
    public function getName(){
        return 'cambiar_password';
    }
}
