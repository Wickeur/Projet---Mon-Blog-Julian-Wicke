<?php

namespace App\Controller;

use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    //Ajouter
    /**
     * @Route("/formation", name="formation")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $formations = $entityManager->getRepository(Formation::class)->findAll();

        $formation = new Formation();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){ //ajouter une nouvelle formation
            //On set chaque valeur de la table
            $formation->setNomEcole($data["nom_ecole"]);
            $formation->setNomDiplome($data["nom_diplome"]);
            $formation->setNomDomaine($data["nom_domaine"]);
            $formation->setDateDebut($data["date_debut"]);
            $formation->setDateFin($data["date_fin"]);
            $formation->setResultat($data["resultat"]);
            $entityManager->persist($formation); //prépare pour l'enregistrement dans la base de données
            $entityManager->flush(); //rafraichir les données
            $msg = "Formation ajoutée avec succés"; //message de confirmation
        }

        return $this->render('formation/index.html.twig', [
            "msg"=>$msg,
            'formations' => $formations
        ]);
    }
    //Modifier
    /**
     * @Route("/modif_formation/{id_formation}", name="modif_formation")
     *
     */
    public function modif_formation(ManagerRegistry $doctrine, Request $request, $id_formation): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations de la formation a modifier
        $formation = $entityManager->getRepository(Formation::class)->findOneBy(["id_formation"=>$id_formation]);

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {
            $formation->setNomEcole($post['nom_ecole']);
            $formation->setNomDiplome($post['nom_diplome']);
            $formation->setNomDomaine($post['nom_domaine']);
            $formation->setDateDebut($post['date_debut']);
            $formation->setDateFin($post['date_fin']);
            $formation->setResultat($post['resultat']);

            // envoie des donnees a la base de donnees
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('formation',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('formation/modif_formation.html.twig', [
            'formation' => $formation,
        ]);
    }
    //Supprimer
    /**
     * @Route("/sup_formation/{id_formation}", name="sup_formation")
     *
     */
    public function sup_formation(ManagerRegistry $doctrine, $id_formation, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations de la formation à supprimer
        $formation=$em->getRepository(Formation::class)->findOneBy(['id_formation'=>$id_formation]);

        $entityManager->remove($formation);
        $entityManager->flush();

        return  $this->redirectToRoute("formation",[], Response::HTTP_SEE_OTHER);
    }
}
