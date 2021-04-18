<?php

namespace App\Controller\Admin;

use App\Entity\Annonces;
use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Doctrine\DBAL\Types\IntegerType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class AnnoncesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonces::class;
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('nomAnnonce'),
            TextareaField::new('descriptionAnnonce'),
            NumberField::new('prixAnnonce'),
            TextareaField::new('photoImageFile')
                ->setFormType(VichImageType::class),
            DateTimeField::new('dateAnnonce'),
            AssociationField::new('categoriesAnnonce'),
            AssociationField::new('regionAnnonce'),
            AssociationField::new('utilisateurAnnonce')

        ];
    }

}
