<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Departement;
use App\Entity\Professeur;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfesseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextType::class)
            ->add('Prenom',TextType::class)
            ->add('Cin',TextType::class)
            ->add('Adresse',TextType::class)
            ->add('Telephone',TextType::class)
            ->add('Email')
            ->add('Date_Recrutement')
            ->add('Cours',EntityType::class, ['class'=>Cours::class, 'choice_label'=>'Intitule',
                'multiple'=>true,
                'expanded'=>false
            ])
            ->add('Departement',EntityType::class, ['class'=>Departement::class,'choice_label'=>'Nom_Departement'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
