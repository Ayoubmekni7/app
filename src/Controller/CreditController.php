<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreditController extends AbstractController
{
    #[Route('/demandeCredit', name: 'app_demandeCredit')]
    public function demandeCredit(): Response
    {
        return $this->render('credit/listedemande.html.twig', [
            'controller_name' => 'CreditController',
        ]);
    }

    #[Route('/listeCredit', name: 'app_listecredit')]
    public function listeCredit(): Response
    {
        return $this->render('credit/listeCredits.html.twig', [
            'controller_name' => 'CreditController',
        ]);
    }

    #[Route('/suivi', name: 'app_suivi')]
    public function suivi(): Response
    {
        return $this->render('credit/suiviCredit.html.twig', [
            'controller_name' => 'CreditController',
        ]);
    }
}
