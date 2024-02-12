<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        return $this->render('compte/listeCompte.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }

    #[Route('/cheque', name: 'app_cheque')]
    public function cheque(): Response
    {
        return $this->render('compte/listeChèques.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }

    #[Route('/virement', name: 'app_virement')]
    public function virement(): Response
    {
        return $this->render('compte/Virements.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }

}
