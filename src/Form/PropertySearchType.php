<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\PropertySearch;
use App\Entity\Regions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('la_categories', EntityType::class,[
                'label' => 'Choix de la catégorie',
                'class' => Categories::class,
                'choice_label' => 'typeCategories',
                'required' => false,
            ])

            ->add('la_region', EntityType::class,[
                'label' => 'Choix de la région',
                'class' => Regions::class,
                'choice_label' => 'nomRegion',
                'required' => false,
            ])

            ->add('maxPrix', IntegerType::class,[
                'label' => 'Prix maximum',
                'required' => false,
                'attr' => [
                    'placeholer' => '300 €'
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
