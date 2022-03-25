<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $projet_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $projet_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projet_descriptif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annee_projet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image_projet;

    public function getProjetId(): ?int
    {
        return $this->projet_id;
    }

    public function getProjetName(): ?string
    {
        return $this->projet_name;
    }

    public function setProjetName(string $projet_name): self
    {
        $this->projet_name = $projet_name;

        return $this;
    }

    public function getProjetDescriptif(): ?string
    {
        return $this->projet_descriptif;
    }

    public function setProjetDescriptif(?string $projet_descriptif): self
    {
        $this->projet_descriptif = $projet_descriptif;

        return $this;
    }

    public function getAnneeProjet(): ?string
    {
        return $this->annee_projet;
    }

    public function setAnneeProjet(?string $annee_projet): self
    {
        $this->annee_projet = $annee_projet;

        return $this;
    }

    public function getImageProjet(): ?string
    {
        return $this->image_projet;
    }

    public function setImageProjet(?string $image_projet): self
    {
        $this->image_projet = $image_projet;

        return $this;
    }
}
