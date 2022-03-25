<?php

namespace App\Controller;


use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionUtilisateurController extends AbstractController
{
    /**
     * @Route("/gestion/utilisateur", name="gestion_utilisateur")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $gestionUtilisateurs = $entityManager->getRepository(User::class)->findAll();

        return $this->render('gestion_utilisateur/index.html.twig', [
            'gestionUtilisateurs' => $gestionUtilisateurs
        ]);
    }
}
