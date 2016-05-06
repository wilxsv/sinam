<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

class AddDepartamentoFieldSubscriber implements EventSubscriberInterface
{
   public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addDepartamentoForm($form, $depto = null)
    {
        $formOptions = array(
            'class' => 'SinamCoreBundle:CtlDepartamento',
            'placeholder' => 'Selecciona...',
            'mapped' => false,
            'attr' => array(
                'class' => '',
            )
        );

        if ($depto) {
            $formOptions['data'] = $depto;
        }

        $form->add('departamento', 'genemu_jqueryselect2_entity', $formOptions);
    }
   public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor = PropertyAccess::createPropertyAccessor();

        $mascota = $accessor->getValue($data, 'mascota');
        $cliente = ($mascota) ? $mascota->getCliente() : null;

        $this->addClienteForm($form, $cliente);
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addClienteForm($form);
    }
}
