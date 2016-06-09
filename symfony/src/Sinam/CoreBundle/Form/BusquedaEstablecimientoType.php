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

class BusquedaEstablecimientoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'entity', array('label' => 'Nombre del medicamento','attr'=>  array('style' => 'width: 80%'), 'class' => 'SinamCoreBundle:SabCatCatalogoproductos','property'=>'nombre',
                'choices_as_values' => true,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                    ->where('p.idTipoproducto = 1')
                    ->orderBy('p.nombre', 'ASC');
                },
            ))
            ->add('lugar',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '90%')))
            ->add('limite',  'number', array('label' => 'Numero de establecimientos a mostrar','attr'=>  array('size' => '90%')))
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
        $builder
            
            ->add('tipo', 'hidden', array( 'data' => 'establecimiento',))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')));
        //$builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        //$builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }

    public function getName()
    {
        return "establecimiento";
    }
}
