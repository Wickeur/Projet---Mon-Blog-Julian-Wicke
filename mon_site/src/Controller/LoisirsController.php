<?php

namespace App\Controller;

use App\Entity\Loisirs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoisirsController extends AbstractController
{
    /**
     * @Route("/loisirs", name="loisirs")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $loisirss = $entityManager->getRepository(Loisirs::class)->findAll();

        $loisir = new Loisirs();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){
            $loisir->setNomLoisirs($data["nom_loisirs"]);
            $loisir->setImageLoisirs($data["image_loisirs"]);
            $loisir->setDescriptionLoisirs($data["description_loisirs"]);
            $entityManager->persist($loisir);
            $entityManager->flush();
            $msg = "Loisirs ajoutée avec succés";
        }

        return $this->render('loisirs/index.html.twig', [
            "msg"=>$msg,
            'loisirss' => $loisirss
        ]);
    }
    /**
     * @Route("/modif_loisirs/{id}", name="modif_loisirs")
     *
     */
    public function modif_loisirs(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations du projet a modifier
        $loisirs = $entityManager->getRepository(Loisirs::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {
            $loisirs->setImageLoisirs($post['image_loisirs']);
            $loisirs->setNomLoisirs($post['nom_loisirs']);
            $loisirs->setDescriptionLoisirs($post['description_loisirs']);

            // envoie des donnees a la base de donnees
            $entityManager->persist($loisirs);
            $entityManager->flush();

            return $this->redirectToRoute('loisirs',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loisirs/modif_loisirs.html.twig', [
            'loisirs' => $loisirs,
        ]);
    }

    /**
     * @Route("/sup_loisirs/{id}", name="sup_loisirs")
     *
     */
    public function sup_loisirs(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        $loisirs=$em->getRepository(Loisirs::class)->findOneBy(['id'=>$id]);
        $entityManager->remove($loisirs);
        $entityManager->flush();

        return  $this->redirectToRoute("loisirs",[], Response::HTTP_SEE_OTHER);
    }
}
