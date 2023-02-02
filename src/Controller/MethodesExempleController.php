<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fonctions')]
class MethodesExempleController extends AbstractController
{    
    #[Route('/', name: 'app_exemple', methods:["GET"])]
    public function index(): Response
    {
        $nomDeSalima = "louisor";
        $info = $this->afficheInfo($nomDeSalima);

        $this->multiplication(4);

        $this->resultSous();

        

        dd($info);

        return $this->render('exemple/index.html.twig', [
            'controller_name' => 'salima',
        ]);
    }   

    #[Route("/new", name:"app_exemple_new", methods:["GET", "POST"])]
    public function new()
    {
        echo "new";
    }

    #[Route("/{id}", name:"app_exemple_show", methods:["GET"])]
    public function show()
    {

        echo "show";
    }

     #[Route("/{id}/edit", name:"app_exemple_edit", methods:["GET", "POST"])]
    public function edit()
    {

    }

    #[Route("/{id}", name:"app_exemple_delete", methods:["POST"])]
    public function delete()
    {

    }
    public function afficheInfo($nom)
    {
        $prenom = "salima";
        $nomEntier = $prenom." ".$nom;
        $tel = 0000;
        $exemple = "paris";

        return [$nomEntier, $tel, $exemple];

    }

    public function multiplication($premier)
    {
        $deuxieme = 2;
        $troisieme = $premier*$deuxieme;
        echo $troisieme. "<br/>";
    }

    public function soustraction()
    {
        $numeroUn = 100;
        $numeroDeux = 200;
        $resultat = $numeroUn - $numeroDeux;
        return $resultat;

    }

    public function resultSous()
    {
        $res = $this->soustraction();
        echo $res;

    }
}