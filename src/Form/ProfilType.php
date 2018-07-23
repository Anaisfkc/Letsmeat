<?php

namespace App\Form;

use App\Entity\Profil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $saveurs = array('salé ', 'sucré 🍬', 'amer 🍊', 'acide 🍋', 'épicé 🌶️', 'sucré/salé 🍯');
        $pratiquefood = array('végétalien 🌱', 'végétarien 🐟', 'omnivore (viande et légumes 🍗🌽) ', 'carnivore (viande mais moins fan des légumes 🍖)');
        $prescriptionfood = array('halal ☪️', 'casher ', 'j\'en ai une autre que celle citée', 'aucune');
        
        $builder
            ->add('saveurs', ChoiceType::class, array(
                'choices'  => $saveurs,
                'multiple' => true,
                'expanded' => true,
                ))
            ->add('pratiquefood')
            ->add('prescriptionfood')
            ->add('typefood')
            ->add('recette')
            ->add('intolerance')
            // ->add('score')
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
