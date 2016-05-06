<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusquedaBasicaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '')))
            ->add('latitud',  'number', array('label' => 'Latitud','attr'=>  array('size' => '6', 'disabled'=>'yes')))
            ->add('longitud',  'number', array('label' => 'Longitud','attr'=>  array('size' => '6', 'disabled'=>'yes')))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')))
        ;
    }
    
    public function getName()
    {
        return "mapa_type";
    }

}
