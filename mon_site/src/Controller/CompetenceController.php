<?php

namespace App\Controller;

use App\Entity\Competence;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    /**
     * @Route("/competence", name="competence")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $competences = $entityManager->getRepository(Competence::class)->findAll();

        $competence = new Competence();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){
            $competence->setNomCompetence($data["nom_competence"]);
            $competence->setImageCompetence($data["image_competence"]);
            $competence->setTypeCompetence($data["type_competence"]);
            $entityManager->persist($competence);
            $entityManager->flush();
            $msg = "Formation ajoutée avec succés";
        }

        return $this->render('competence/index.html.twig', [
            "msg"=>$msg,
            'competences' => $competences
        ]);
    }
    /**
     * @Route("/sup_competence/{id}", name="sup_competence")
     *
     */
    public function sup_competence(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        $competence=$em->getRepository(Competence::class)->findOneBy(['id'=>$id]);
        $entityManager->remove($competence);
        $entityManager->flush();

        return  $this->redirectToRoute("competence",[], Response::HTTP_SEE_OTHER);
    }
}
