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
            ->add('mes',  ChoiceType::class, array( 'label' => 'Seleccione el mes a consultar',
                'choices' => [
                    'Meses' => [
                        'Enero' => '1',
                        'Febrero' => '2',
                        'Marzo' => '3',
                        'Abril' => '4',
                        'Mayo' => '5',
                        'Junio' => '6',
                        'Julio' => '7',
                        'Agosto' => '8',
                        'Septiembre' => '9',
                        'Octubre' => '10',
                        'Noviembre' => '11',
                        'Diciembre' => '12'
                        ],
                    'Periodo' => [
                        'Ene - Mar' => '13',
                        'Abr - Jun' => '14',
                        'Jul - Sep' => '15',
                        'Oct - Dic' => '16'
                        ]
                ], 'choices_as_values' => true ))
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
