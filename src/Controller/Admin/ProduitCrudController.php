<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\PhotoType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextEditorField::new('description'),
            IntegerField::new('stock'),
            NumberField::new('prix'),
            CollectionField::new('photos')
            ->setEntryType(PhotoType::class)
            ->setFormTypeOption('by_reference', false)
            ->onlyOnForms(),
            CollectionField::new('photos')
            ->setTemplatePath('produit/images.html.twig')
            ->onlyOnDetail(),
            AssociationField::new('categories')
            ->autocomplete(),
        ];
    }

    
     public function configureActions(Actions $actions): Actions
      {
          return $actions->add(Crud::PAGE_INDEX, Action::DETAIL) ;
        }
    
}
