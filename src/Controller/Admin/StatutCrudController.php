<?php

namespace App\Controller\Admin;

use App\Entity\Statut;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StatutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Statut::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('position'),
            BooleanField::new('actif')
        ];
    }
  
}
