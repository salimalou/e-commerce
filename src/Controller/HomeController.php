<?php

namespace App\Controller;

use App\Repository\PhotoRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitRepository $pr, PhotoRepository $pv): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'deuxieme_element' => 'salima',
            'tout_les_produit' => $pr->findAll(),
            'tout_les_photo' => $pv->findAll(),
        ]);
    }
}
