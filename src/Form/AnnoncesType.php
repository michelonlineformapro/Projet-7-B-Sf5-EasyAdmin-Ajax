<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Categories;
use App\Entity\Regions;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomAnnonce', TextType::class,[
                'label' => 'Nom de votre produit'
            ])
            ->add('descriptionAnnonce', TextareaType::class,[
                'label' => 'Description de produit'
            ])
            ->add('prixAnnonce', NumberType::class,[
                'label' => 'Prox du produit'
            ])
            ->add('photoAnnonce', FileType::class,[
                'label' => 'Image du produit',
                'required' => false,
                'data_class' => null,
                'empty_data' => 'Aucune image pour ce produit',
            ])
            ->add('dateAnnonce', DateTimeType::class,[
                'label' => 'Date de création du produit'
            ])
            ->add('categoriesAnnonce', EntityType::class,[
                'class' => Categories::class,
                'choice_label' => 'typeCategories',
                'label' => 'Selectionnez la catégorie du produit'
            ])
            ->add('regionAnnonce', EntityType::class,[
                'class' => Regions::class,
                'choice_label' => 'nomRegion',
                'label' => 'Selectionnez votre région'
            ])
            ->add('utilisateurAnnonce', EntityType::class,[
                'class' => User::class,
                'choice_label' => 'email',
                'label' => 'Nom du vendeur',
                'empty_data' => function($user){
                return $user->getEmail();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
