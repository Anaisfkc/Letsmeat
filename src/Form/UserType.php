<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('genre')
            ->add('datenaissance')
            ->add('pseudo')
            ->add('email')
            ->add('mdp')
            ->add('mdpconfirm')
            ->add('phone')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            // ->add('proposition')
            // ->add('profil')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
