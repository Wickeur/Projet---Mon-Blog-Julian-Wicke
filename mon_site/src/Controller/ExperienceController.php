<?php

namespace App\Controller;

use App\Entity\Experience;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/experience", name="experience")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $experiences = $entityManager->getRepository(Experience::class)->findAll();

        $experience = new Experience();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){
            $experience->setNomPoste($data["nom_poste"]);
            $experience->setTypePoste($data["type_poste"]);
            $experience->setNomEntreprise($data["nom_entreprise"]);
            $experience->setLieuEntreprise($data["lieu_entreprise"]);
            $experience->setDateDebutExp($data["date_debut_exp"]);
            $experience->setDateFinExp($data["date_fin_exp"]);
            $experience->setDescriptifExp($data["descriptif_exp"]);
            $entityManager->persist($experience);
            $entityManager->flush();
            $msg = "Expérience ajoutée avec succés";
        }

        return $this->render('experience/index.html.twig', [
            "msg"=>$msg,
            'experiences' => $experiences
        ]);
    }
    /**
     * @Route("/modif_experience/{id_experience}", name="modif_experience")
     *
     */
    public function modif_experience(ManagerRegistry $doctrine, Request $request, $id_experience): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations du projet a modifier
        $experience = $entityManager->getRepository(Experience::class)->findOneBy(["id_experience"=>$id_experience]);

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {
            $experience->setNomPoste($post['nom_poste']);
            $experience->setNomEntreprise($post['nom_entreprise']);
            $experience->setLieuEntreprise($post['lieu_entreprise']);
            $experience->setDateDebutExp($post['date_debut_exp']);
            $experience->setDateFinExp($post['date_fin_exp']);
            $experience->setDescriptifExp($post['descriptif_exp']);

            // envoie des donnees a la base de donnees
            $entityManager->persist($experience);
            $entityManager->flush();

            return $this->redirectToRoute('experience',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('experience/modif_experience.html.twig', [
            'experience' => $experience,
        ]);
    }

    /**
     * @Route("/sup_experience/{id_experience}", name="sup_experience")
     *
     */
    public function sup_experience(ManagerRegistry $doctrine, $id_experience, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        $experience=$em->getRepository(Experience::class)->findOneBy(['id_experience'=>$id_experience]);
        $entityManager->remove($experience);
        $entityManager->flush();

        return  $this->redirectToRoute("experience",[], Response::HTTP_SEE_OTHER);
    }
}
