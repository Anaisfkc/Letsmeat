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

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        
        $builder
            ->add('saveurs', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Sale 🐚' => 'sale', 'Sucre 🍬' => 'sucre' , 'Amer 🍊' => 'amer', 'Acide 🍋' => 'acide', 'Epice 🌶️' => 'epice', 'Sucre/Sale 🍯' => 'sucresale'),
                'multiple' => true,
                'expanded' => true,
            ))

            ->add('pratiquefood', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Vegetalien 🥗' => 'vegetalien', 'Vegetarien 🐟🥑' => 'vegetarien' , 'Omnivore : viandes et legumes 🍗🌽' => 'omnivore', 'Carnivore : viande mais pas trop legumes 🍖🥩' => 'carnivore'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('prescriptionfood', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Halal ☪️' => 'halal', 'Cacher ✡️' => 'casher' , 'J\'en ai une mais autre que celles citees 🚩' => 'autre', 'Aucune 🏳️' => 'aucune'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('typefood', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Fastfood 🍔' => 'fastfood', 'Slowfood 🍝' => 'slowfood'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('recette', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Boeuf Bourguignon 🍲' => 'bourguignon', 'Paëlla 🦐' => 'paella', 'Nouilles Thaï 🍜' => 'nouilles', 'Tiep Bou Dien 🍛' => 'tiep', 'Mac and Cheese 🧀' => 'macncheese', 'Tajine d\'Agneau 🍲' => 'tajine', 'Poulet au Curry 🍗' => 'pouletcurry'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('intolerance', ChoiceType::class, array(
                'help' => '*Choix unique ou multiples',
                'choices'  => array('Cereales contenant gluten 🌾' => 'gluten', 'Fruits de mer 🦐' => 'fruitsDeMer', 'Œufs 🥚' => 'oeufs', 'Arachides 🥜' => 'archides', 'Soja 🌱' => 'soja', 'Lait 🥛' => 'lait', 'Fruits à coques 🌰' => 'fruitsCoques', 'J\'en ai une ou plusieurs mais autre que celles citees 🚨' => 'autreIntoler', 'Aucune ✔️' => 'aucune'),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('score', HiddenType::class);
            // ->add('user')
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}