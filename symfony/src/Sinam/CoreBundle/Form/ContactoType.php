<?php

namespace Sinam\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class ContactoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',  'text', array('label' => 'Nombre','attr'=>  array('size' => '78%', 'placeholder' => 'Ingrese su nombre', 'class' => 'name')))
            ->add('asunto',  'text', array('label' => 'Asunto','attr'=>  array('size' => '78%', 'placeholder' => 'Asunto')))
            ->add('correo',  'text', array('label' => 'Correo','attr'=>  array('size' => '78%', 'placeholder' => 'Correo')))
            ->add('comentario', TextareaType::class, array('label' => 'Nombre del medicamento','attr'=>  array('size' => '100%', 'placeholder' => 'Comentario', 'class' => 'tinymce')))
        ;
    }
    
    public function getName()
    {
        return "contacto";
    }

}
