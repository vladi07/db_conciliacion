<?php

namespace App\Form;

use App\Entity\Centro;
use App\Entity\Departamento;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricula', null,[
                'label' => 'Matrícula'
            ])
            ->add('resolucion', null, [
                'label' => 'Nro. de Resolución de la Matrícula',
                'required' => false,
            ])
            ->add('inicioVigencia', DateType::class,[
                'label' => 'Inicio de la Vigencia de la Matrícula',
                'widget' => 'single_text',
            ] )
            ->add('finVigencia', DateType::class,[
                'label' => 'Fin de la Vigencia de la Matrícula',
                'widget' => 'single_text',
            ])
            ->add('nombreCentro', TextType::class, [
                'label' => 'Nombre del Centro'
            ])
            ->add('representante', TextType::class, [
                'label' => 'Nombre del Representante Legal'
            ])
            ->add('cargo', TextType::class, [
                'label' => 'Cargo del Representante Legal',
            ])
            ->add('dpto', EntityType::class,[
                'placeholder' => 'Seleccione una opción',
                'class' => Departamento::class,
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('zona', TextType::class,[
                'label' => 'Zona o Barrio',
            ])
            ->add('direccion', TextType::class,[
                'label' => 'Dirección'
            ])
            ->add('telefono', NumberType::class, array(
                'label' => 'Número de Teléfono',
                'required' => false,
                'help' => 'Ingrese solo números, sin ningun signo',
            ))
            ->add('fax')
            ->add('correo', EmailType::class, [
                'help' => 'Ej: mi.correo@gmail.com',
                'required' => false,
            ])
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar Centro',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Centro::class,
        ]);
    }
}
