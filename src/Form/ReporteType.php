<?php

namespace App\Form;

use App\Entity\Reporte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gestion', null, [
                'label' => 'Gestión',
                'required' => true,
            ])
            ->add('acta', null, [
                'label' => 'Cantidad de Actas Elaboradas y Archivadas',
                'required' => false
            ])
            ->add('virtual', null, [
                'label' => 'Cantidad de Casos Efectuados de Forma Virtual',
            ])
            ->add('fileReporte')
            /*->add('centro')*/
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar Reporte',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reporte::class,
        ]);
    }
}
