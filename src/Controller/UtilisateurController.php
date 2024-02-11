<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }

    #[Route('/listeEmploye', name: 'app_listeEmploye')]
    public function listeEmploye(): Response
    {
        return $this->render('utilisateur/listeEmployes.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }
    
    #[Route('/listeClients', name: 'app_listeClients')]
    public function listeClients(): Response
    {
        return $this->render('utilisateur/listeClients.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }
}
