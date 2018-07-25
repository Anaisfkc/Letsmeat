<?php

namespace App\Form;

use App\Entity\Profil;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        
        $builder
            ->add('sale', CheckboxType::class, array(
                'label' => 'Sale 🐚'))
            ->add('sucre', CheckboxType::class, array(
                'label' => 'Sucre 🍬'))
            ->add('amer', CheckboxType::class, array(
                'label' => 'Amer 🍊'))
            ->add('acide', CheckboxType::class, array(
                'label' => 'Acide 🍋'))
            ->add('epice', CheckboxType::class, array(
                'label' => 'Epice 🌶️'))
            ->add('sucresale', CheckboxType::class, array(
                'label' => 'Sucre/Sale 🍯'))

            ->add('vegetalien', CheckboxType::class, array(
                'label' => 'Vegetalien 🥗'))
            ->add('vegetarien', CheckboxType::class, array(
                'label' => 'Vegetarien 🐟🥑'))
            ->add('omnivore', CheckboxType::class, array(
                'label' => 'Omnivore : viandes et legumes 🍗🌽'))
            ->add('carnivore', CheckboxType::class, array(
                'label' => 'Carnivore : viande mais pas trop legumes 🍖🥩'))

            ->add('halal', CheckboxType::class, array(
                'label' => 'Halal ☪️'))
            ->add('cacher', CheckboxType::class, array(
                'label' => 'Cacher ✡️'))
            ->add('autre', CheckboxType::class, array(
                'label' => 'Une autre que celles citees 🚩'))

            ->add('fastfood', CheckboxType::class, array(
                'label' => 'Fastfood 🍔'))
            ->add('slowfood', CheckboxType::class, array(
                'label' => 'Slowfood 🍝'))

            ->add('bourguignon', CheckboxType::class, array(
                'label' => 'Boeuf Bourguignon 🍲'))
            ->add('paella', CheckboxType::class, array(
                'label' => 'Paëlla 🦐'))
            ->add('nouille', CheckboxType::class, array(
                'label' => 'Nouilles Thaï 🍜'))
            ->add('tiepboudien', CheckboxType::class, array(
                'label' => 'Tiep Bou Dien 🍛'))
            ->add('macncheese', CheckboxType::class, array(
                'label' => 'Mac and Cheese 🧀'))
            ->add('tajine', CheckboxType::class, array(
                'label' => 'Tajine d\'Agneau 🍲'))
            ->add('pouletcurry', CheckboxType::class, array(
                'label' => 'Poulet au Curry 🍗'))

            ->add('gluten', CheckboxType::class, array(
                'label' => 'Cereales contenant gluten 🌾'))
            ->add('fruitsdemer', CheckboxType::class, array(
                'label' => 'Fruits de mer 🦐'))
            ->add('oeuf', CheckboxType::class, array(
                'label' => 'Œufs 🥚'))
            ->add('arachide', CheckboxType::class, array(
                'label' => 'Arachides 🥜'))
            ->add('soja', CheckboxType::class, array(
                'label' => 'Soja 🌱'))
            ->add('lait', CheckboxType::class, array(
                'label' => 'Lait 🥛'))
            ->add('fruitsacoques', CheckboxType::class, array(
                'label' => 'Fruits à coques 🌰'))
            ->add('autreintolerance', CheckboxType::class, array(
                'label' => 'Une autre que celles citees 🚨'))

            ->add('score', HiddenType::class)
            ->add('user', HiddenType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}