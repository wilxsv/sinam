<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class BusquedaBasicaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'entity', array('label' => 'Nombre del medicamento','attr'=>  array('style' => 'width: 80%'), 'class' => 'SinamCoreBundle:FarmCatalogoproductos','property'=>'nombre',
                'choices_as_values' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.id > 0')
                    ->orderBy('p.nombre', 'ASC');
                },
            ))
            ->add('departamento',  'entity', array('label' => 'departamento','attr'=>  array('onchange' => 'cargarMun(this.value);', 'style' => 'width: 90%'), 'class' => 'SinamCoreBundle:CtlDepartamento','property'=>'nombre',
                'choices_as_values' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.idPais = 68')
                    ->orderBy('p.nombre', 'ASC');
                },
            ))
            ->add('municipio',  'entity', array('label' => 'municipio','attr'=>  array('onchange' => 'cargarEsta(this.value);', 'style' => 'width: 90%'), 'class' => 'SinamCoreBundle:CtlMunicipio','property'=>'nombre',
                'choices_as_values' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->orderBy('p.nombre', 'ASC');
                },
            ))
            ->add('establecimiento', 'entity', array('label' => 'establecimiento','attr'=>  array('style' => 'width: 90%'), 'class' => 'SinamCoreBundle:CtlEstablecimiento','property'=>'nombre', 'choices_as_values' => true,
                'query_builder' => function(EntityRepository $er) { return $er->createQueryBuilder('p')->orderBy('p.nombre', 'ASC'); }, ))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')));
        ;
    }
    
    public function getName()
    {
        return "basica";
    }

}
