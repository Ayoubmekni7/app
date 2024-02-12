<?php

namespace App\Controller;


use App\Entity\Demandestage;
use App\Form\DemandeStageType;
use App\Repository\DemandestageRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class DemandeStageController extends AbstractController
{
    #[Route('/demande/stage', name: 'app_demande_stage')]
    public function index(): Response
    {
        return $this->render('frontOffice/demande_stage/demande.html.twig', [
            'controller_name' => 'DemandeStageController',
        ]);
    }
    #[Route('/demandeStage', name: 'demandeStage')]
    public function demandeStage(Request $request,ManagerRegistry $managerRegistry,MailerInterface $mailer ): Response
    {
        $demande = new Demandestage();
        $form = $this->createForm(DemandeStageType::class, $demande);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $from = 'yesser.khaloui@etudiant-fst.utm.tn';
            $x = $managerRegistry->getManager();
            $x->persist($demande);
            $x->flush();
            $to= $demande->getEmail();
            $nom=$demande->getNom();
            $domaine = $demande->getDomaine();
            $subject="add with success";
            $text = "!!";
            $html = "";
            $this->sendmail($from,$to,$subject,$text,$html,"add with success",$mailer);
           
        }
        return $this->render('frontOffice/demande_stage/demande.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/AffichageDesDemandes', name: 'AffichageDesDemandes')]
    public function AffichageDesDemandes(DemandestageRepository $demandestageRepository): Response
    {
        $liste = $demandestageRepository->findAll();
        return $this->render('frontOffice/demande_stage/affichage.html.twig', [
            'Demandes' => $liste,
        ]);
    }
    #[Route('/modifierDemande/{id}', name: 'modifierDemande')]
    public function modifierDemande($id, ManagerRegistry $manager, DemandestageRepository $demandestageRepository, Request $request,): Response
    {
        // var_dump($id) . die();

        $em = $manager->getManager();
        $idData = $demandestageRepository->find($id);
        // var_dump($idData) . die();
        $form = $this->createForm(DemandeStageType::class, $idData);
        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $em->persist($idData);
            $em->flush();
            return new Response("update with succcess");
        }
        return $this->renderForm('frontOffice/demande_stage/edit.html.twig', [
            'Demandes' => $form
        ]);
    }
    
    public function sendmail($from,$to,$subject,$text,$html,$messageDeReponse,$mailer) : Response
    {
        $email = (new Email())
            ->from($from)
            ->to($to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text($text)
            ->html($html);
        
        try {
            // to send the email you should run this command  php bin/console messenger:consume async
            $mailer->send($email);
            return new Response($messageDeReponse);
        } catch (TransportExceptionInterface $e) {
            
            return $this->redirectToRoute('demandeStage');
        }
        
        
        
    }
    





}
