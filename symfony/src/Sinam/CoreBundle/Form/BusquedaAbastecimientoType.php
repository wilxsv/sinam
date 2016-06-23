<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;


class BusquedaAbastecimientoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '100%')))
            ->add('mes',  ChoiceType::class, [
                'choices' => [
                    'Meses' => [
                        '1' => 'Enero',
                        '2' => 'Febrero',
                        '3' => 'Marzo',
                        '4' => 'Abril',
                        '5' => 'Mayo',
                        '6' => 'Junio',
                        '7' => 'Julio',
                        '8' => 'Agosto',
                        '9' => 'Septiembre',
                        '10' => 'Octubre',
                        '11' => 'Noviembre',
                        '12' => 'Diciembre'
                        ],
                    'Periodo' => [
                        '13' => 'Ene - Mar',
                        '14' => 'Abr - Jun',
                        '15' => 'Jul - Sep',
                        '16' => 'Oct - Dic'
                        ]
                ], 'choices_as_values' => true, array('label' => 'Seleccione el mes a consultar','attr'=>  array('size' => '100%')))
            ->add('departamento',  EntityType::class, array('label' => 'Seleccione el departamento','attr'=>  array('onchange' => 'cargarMun(this.value);', 'style' => 'width: 90%'), 'class' => 'SinamCoreBundle:CtlDepartamento','choice_label'=>'nombre'))
            ->add('municipio',  EntityType::class, array('label' => 'Seleccione el municipio', 'class' => 'SinamCoreBundle:CtlMunicipio','choice_label'=>'nombre', 'attr'=>  array('onchange' => 'cargarEsta(this.value);', 'style' => 'width: 90%')))
            ->add('establecimiento', EntityType::class, array('label' => 'Seleccione el establecimiento','class' => 'SinamCoreBundle:CtlEstablecimiento', 'choice_label' => 'nombre'))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')))
        ;
    }
    
    public function getName()
    {
        return "abastecimiento";
    }

}
