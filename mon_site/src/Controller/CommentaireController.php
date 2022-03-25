<?php

namespace App\Controller;

use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $commentaires = $entityManager->getRepository(Commentaire::class)->findAll();

        $commentaire = new Commentaire();
        $msg = "";
        $data=$request->request->all();
        if(count($data)){
            $commentaire->setPrenomCommentaire($data["prenom_commentaire"]);
            $commentaire->setNomCommentaire($data["nom_commentaire"]);
            $commentaire->setEmailCommentaire($data["email_commentaire"]);
            $commentaire->setContenuCommentaire($data["contenu_commentaire"]);
            $entityManager->persist($commentaire);
            $entityManager->flush(); //transvers le commentaire à la base de donnée
            $msg = "Commentaire ajouté avec succés";
        }
        return $this->render('commentaire/index.html.twig', [
            "msg"=>$msg,
            'commentaires' => $commentaires
        ]);
    }
    /**
     * @Route("/delete_commentaire/{id}", name="delete_commentaire")
     *
     */
    public function delete_commentaire(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        $commentaire=$em->getRepository(Commentaire::class)->findOneBy(['id'=>$id]);
        $entityManager->remove($commentaire);
        $entityManager->flush();

        return  $this->redirectToRoute("commentaire",[], Response::HTTP_SEE_OTHER);
    }

}
