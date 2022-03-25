<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_experience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu_entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_debut_exp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_fin_exp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptif_exp;

    public function getIdExperience(): ?int
    {
        return $this->id_experience;
    }

    public function getNomPoste(): ?string
    {
        return $this->nom_poste;
    }

    public function setNomPoste(string $nom_poste): self
    {
        $this->nom_poste = $nom_poste;

        return $this;
    }

    public function getTypePoste(): ?string
    {
        return $this->type_poste;
    }

    public function setTypePoste(string $type_poste): self
    {
        $this->type_poste = $type_poste;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    public function getLieuEntreprise(): ?string
    {
        return $this->lieu_entreprise;
    }

    public function setLieuEntreprise(string $lieu_entreprise): self
    {
        $this->lieu_entreprise = $lieu_entreprise;

        return $this;
    }

    public function getDateDebutExp(): ?string
    {
        return $this->date_debut_exp;
    }

    public function setDateDebutExp(string $date_debut_exp): self
    {
        $this->date_debut_exp = $date_debut_exp;

        return $this;
    }

    public function getDateFinExp(): ?string
    {
        return $this->date_fin_exp;
    }

    public function setDateFinExp(?string $date_fin_exp): self
    {
        $this->date_fin_exp = $date_fin_exp;

        return $this;
    }

    public function getDescriptifExp(): ?string
    {
        return $this->descriptif_exp;
    }

    public function setDescriptifExp(?string $descriptif_exp): self
    {
        $this->descriptif_exp = $descriptif_exp;

        return $this;
    }
}
