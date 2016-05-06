<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FarmCatalogoproductosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('idtipoproducto')
            ->add('nombre')
            ->add('niveluso')
            ->add('concentracion')
            ->add('formafarmaceutica')
            ->add('presentacion')
            ->add('prioridad')
            ->add('precioactual')
            ->add('aplicalote')
            ->add('existenciaactual')
            ->add('especificacionestecnicas')
            ->add('codigonacionesunidas')
            ->add('pertenecelistadooficial')
            ->add('estadoproducto')
            ->add('observacion')
            ->add('auusuariocreacion')
            ->add('aufechacreacion', 'datetime')
            ->add('auusuariomodificacion')
            ->add('aufechamodificacion', 'datetime')
            ->add('estasincronizada')
            ->add('idestablecimiento')
            ->add('clasificacion')
            ->add('areatecnica')
            ->add('tipouaci')
            ->add('idespecificogasto')
            ->add('ultimoprecio')
            ->add('idestado')
            ->add('divisormedicina')
            ->add('idunidadmedida')
            ->add('idterapeutico')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sinam\CoreBundle\Entity\FarmCatalogoproductos'
        ));
    }
}
