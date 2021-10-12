<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombres'
            ])
            ->add('primerApellido', TextType::class, [
                'label' => 'Primer Apellido'
            ])
            ->add('segundoApellido', TextType::class, [
                'label' => 'Segundo Apellido',
                'required' => false,
            ])
            ->add('username', TextType::class,[
                'label' => 'Usuario',
            ])
            ->add('password', PasswordType::class,[
                'label' => 'Contraseña'
            ])
            ->add('roles', ChoiceType::class,[
                'label' => 'Rol de Usuario',
                'mapped' => false,
                'placeholder' => 'Seleccione un ROL para este Usuario',
                'choices' => [
                    'ADMINISTRADOR' => 1,
                    'USUARIO' => 2
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
