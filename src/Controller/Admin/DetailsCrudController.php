<?php

namespace App\Controller\Admin;

use App\Entity\Details;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class DetailsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Details::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('quantite'),
        ];
    }
    
}
