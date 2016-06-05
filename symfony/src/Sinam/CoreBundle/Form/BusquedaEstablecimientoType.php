<?php

namespace Sinam\CoreBundle\Form;

use Doctrine\ORM\EntityManager;
use Sinam\CoreBundle\Entity\CtlDepartamento;
use Sinam\CoreBundle\Entity\CtlMunicipio;
use Sinam\CoreBundle\Entity\CtlEstablecimiento;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BusquedaEstablecimientoType extends AbstractType
{
    protected $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre del medicamento','attr'=>  array('size' => '')))
            ->add('tipo', 'hidden', array( 'data' => 'establecimiento',))
            ->add('save', 'submit', array('label' => 'Buscar','attr'=>  array('class' => 'submit-btn')));
        //$builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        //$builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }
    
    protected function addElements(FormInterface $form, $depto = null, $munis = null) {
		
		
        // Remove the submit button, we will place this at the end of the form later
        $submit = $form->get('save');
        $form->remove('save');


        // Add the province element
        $form->add('departamento', 'entity', array(
            'data' => $depto,
            'empty_value' => '-- Seleccionar --',
            'class' => 'SinamCoreBundle:CtlDepartamento',
            'query_builder' => function(EntityRepository $repository) { 
            return $repository->createQueryBuilder('u')->orderBy('u.idPais, u.nombre', 'ASC');
        },
            'mapped' => false)
        );
        
        $municipios = array();
        if ($depto) {
            $repo = $this->em->getRepository('SinamCoreBundle:CtlMunicipio');
            $municipios = $repo->findByNombre($depto, array('nombre' => 'asc'));
        }
        $establecimientos = array();
        if ($depto) {
            $repo = $this->em->getRepository('SinamCoreBundle:CtlEstablecimiento');
            $municipios = $repo->findByNombre($depto, array('nombre' => 'asc'));
        }

        $form->add('municipio', 'entity', array(
            'empty_value' => '-- Seleccione departamento primero --',
            'class' => 'SinamCoreBundle:CtlMunicipio',
            'choices' => $municipios,
        ));
        
        $form->add('establecimiento', 'entity', array(
            'empty_value' => '-- Seleccione municipio primero --',
            'class' => 'SinamCoreBundle:CtlEstablecimiento',
            'choices' => $establecimientos,
        ));

        // Add submit button again, this time, it's back at the end of the form
        $form->add($submit);
    }
    
     function onPreSubmit(FormEvent $event) {
        $form = $event->getForm();
        $data = $event->getData();

        // Note that the data is not yet hydrated into the entity.
        $municipio = $this->em->getRepository('SinamCoreBundle:CtlMunicipio')->find($data['municipio']);
        $establecimientos = $this->em->getRepository('SinamCoreBundle:CtlEstablecimiento')->find($data['establecimiento']);
        $this->addElements($form, $municipio, $establecimientos);
    }
    
    function onPreSetData(FormEvent $event) {
        $account = $event->getData();
        $form = $event->getForm();
        $this->addElements($form, null);
    }
    
    public function getName()
    {
        return "establecimiento_type";
    }
}
