<?php

namespace App\Form;

use App\Entity\Idioma;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdiomaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('castellano')
            ->add('aymara')
            ->add('quechua')
            ->add('otro')
            //->add('reporte')
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar registro',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idioma::class,
        ]);
    }
}
