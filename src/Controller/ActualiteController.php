<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/', name: 'app_actualite')]
    public function index(): Response
    {
        return $this->render('actualite/index.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }

    #[Route('/actualite', name: 'app_listearticle')]
    public function listearticle(): Response
    {
        return $this->render('actualite/list.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }
    
    #[Route('/addarticle', name: 'app_addarticle')]
    public function addarticle(): Response
    {
        return $this->render('actualite/add.html.twig', [
            'controller_name' => 'ActualiteController',
        ]);
    }
}
