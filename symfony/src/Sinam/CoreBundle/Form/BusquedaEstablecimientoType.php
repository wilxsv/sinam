<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

class BusquedaEstablecimientoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '120%')))
            ->add('lugar',  'text', array('label' => 'Lugar','attr'=>  array('size' => '100%')))
            ->add('limite',  'number', array('label' => 'Numero de establecimientos a mostrar','attr'=>  array('size' => '90%')))
            ->add('departamento',  EntityType::class, array('label' => 'Seleccione el departamento','attr'=>  array('onchange' => 'cargarMun(this.value);', 'class' => 'custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left ui-autocomplete-input'), 'class' => 'SinamCoreBundle:CtlDepartamento','choice_label'=>'nombre'))
            ->add('municipio',  EntityType::class, array('label' => 'Seleccione el municipio', 'class' => 'SinamCoreBundle:CtlMunicipio','choice_label'=>'nombre', 'attr'=>  array('onchange' => 'cargarEsta(this.value);', 'class' => 'custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left ui-autocomplete-input')))
            ->add('establecimiento', EntityType::class, array('label' => 'Seleccione el establecimiento','class' => 'SinamCoreBundle:CtlEstablecimiento', 'choice_label' => 'nombre', 'attr'=>  array('class' => 'custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left ui-autocomplete-input')))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')));
    }

    public function getName()
    {
        return "establecimiento";
    }
}
