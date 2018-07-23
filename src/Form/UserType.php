<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('genre', ChoiceType::class, array('choices' => array('Femme' => 'Femme',
            'Homme' => 'Homme'),'expanded' => true,'multiple' => false,))
            ->add('datenaissance', BirthdayType::class, array('years' => range(1918, date('Y'))))
            ->add('pseudo', TextType::class)
            ->add('email', EmailType::class)
            ->add('mdp', PasswordType::class, array('help' => '*Renseigne un mot de passe entre 5 à 20 caractères, contenant au moins une majuscule, au moins un chiffre'))
            ->add('mdpconfirm', PasswordType::class, array('help' => '*Les mots de passe doivent être identiques'))
            ->add('phone', NumberType::class)
            ->add('adresse', TextType::class)
            ->add('ville', TextType::class)
            ->add('cp', NumberType::class)
            ->add('proposition', HiddenType::class)
            ->add('profil', HiddenType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
