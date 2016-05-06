<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class BusquedaHistorialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '')))
            ->add('presentacion',  'entity', array('label' => 'Presentación','class' => 'SinamCoreBundle:FarmCatalogoproductos','property'=>'presentacion',
				'choices_as_values' => true,
				'query_builder' => function(EntityRepository $er) {
					return $er->createQueryBuilder('p')
					->groupBy('p.presentacion, p.id')
					->addGroupBy('p.id')
					->orderBy('p.presentacion', 'ASC');
				},
            ))
            ->add('unidad',  'entity', array('label' => 'Unidad de medida','class' => 'SinamCoreBundle:FarmUnidadmedidas'))
            ->add('concentracion',  'choice', array('label' => 'Concentracion','choices'  => array('2' => '250 mg/ml','0' => '500 mg','3' => '(150 + 15)mg','0' => '1.2 MUI')))
            ->add('almacen',  'choice', array('label' => 'Incluir informacion de almacenes','choices'  => array('1' => 'Si','0' => 'No')))
            ->add('periodo',  'text', array('label' => 'Periodo','attr'=>  array('size' => '')))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')))
        ;
    }
    public function getName()
    {
        return "historial_type";
    }

}
