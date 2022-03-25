<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_commentaire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contenu_commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommentaire(): ?string
    {
        return $this->nom_commentaire;
    }

    public function setNomCommentaire(string $nom_commentaire): self
    {
        $this->nom_commentaire = $nom_commentaire;

        return $this;
    }

    public function getPrenomCommentaire(): ?string
    {
        return $this->prenom_commentaire;
    }

    public function setPrenomCommentaire(string $prenom_commentaire): self
    {
        $this->prenom_commentaire = $prenom_commentaire;

        return $this;
    }

    public function getEmailCommentaire(): ?string
    {
        return $this->email_commentaire;
    }

    public function setEmailCommentaire(string $email_commentaire): self
    {
        $this->email_commentaire = $email_commentaire;

        return $this;
    }

    public function getContenuCommentaire(): ?string
    {
        return $this->contenu_commentaire;
    }

    public function setContenuCommentaire(?string $contenu_commentaire): self
    {
        $this->contenu_commentaire = $contenu_commentaire;

        return $this;
    }
}
