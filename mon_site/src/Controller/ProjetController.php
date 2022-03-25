<?php

namespace App\Controller;

use App\Entity\Projet;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $projets = $entityManager->getRepository(Projet::class)->findAll();

        $projet = new Projet();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){
            $projet->setProjetName($data["projet_name"]);
            $projet->setImageProjet($data["image_projet"]);
            $projet->setAnneeProjet($data["annee_projet"]);
            $projet->setProjetDescriptif($data["projet_descriptif"]);
            $entityManager->persist($projet);
            $entityManager->flush();
            $msg = "Projet ajoutée avec succés";
        }

        return $this->render('projet/index.html.twig', [
            "msg"=>$msg,
            'projets' => $projets
        ]);
    }
    /**
     * @Route("/modif_projet/{id_projet}", name="modif_projet")
     *
     */
    public function modif_projet(ManagerRegistry $doctrine, Request $request, $id_projet): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations du projet a modifier
        $projet = $entityManager->getRepository(Projet::class)->findOneBy(["projet_id"=>$id_projet]);

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {
            $projet->setProjetName($post['projet_name']);
            $projet->setImageProjet($post['image_projet']);
            $projet->setAnneeProjet($post['annee_projet']);
            $projet->setProjetDescriptif($post['projet_descriptif']);


            // envoie des donnees a la base de donnees
            $entityManager->persist($projet);
            $entityManager->flush();

            return $this->redirectToRoute('projet',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('projet/edit_projet.html.twig', [
            'projet' => $projet,
        ]);
    }
    //Supprimer
    /**
     * @Route("/sup_projet/{projet_id}", name="sup_projet")
     *
     */
    public function sup_projet(ManagerRegistry $doctrine, $projet_id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        $projet=$em->getRepository(Projet::class)->findOneBy(['projet_id'=>$projet_id]);
        $entityManager->remove($projet);
        $entityManager->flush();

        return  $this->redirectToRoute("projet",[], Response::HTTP_SEE_OTHER);
    }
}
