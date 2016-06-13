<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;


class BusquedaBasicaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'entity', array('label' => 'Nombre del medicamento','attr'=>  array('style' => 'width: 80%'), 'class' => 'SinamCoreBundle:SabCatCatalogoproductos','choice_label'=>'nombre'))
            ->add('departamento',  EntityType::class, array('label' => 'Seleccione el departamento','attr'=>  array('onchange' => 'cargarMun(this.value);', 'style' => 'width: 90%'), 'class' => 'SinamCoreBundle:CtlDepartamento','choice_label'=>'nombre'))
            ->add('municipio',  EntityType::class, array('label' => 'Seleccione el municipio', 'class' => 'SinamCoreBundle:CtlMunicipio','choice_label'=>'nombre', 'attr'=>  array('onchange' => 'cargarEsta(this.value);', 'style' => 'width: 90%')))
            ->add('establecimiento', EntityType::class, array('label' => 'Seleccione el establecimiento','class' => 'SinamCoreBundle:CtlEstablecimiento', 'choice_label' => 'nombre'))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')))
        ;
    }
    
    public function getName()
    {
        return "basica";
    }

}
