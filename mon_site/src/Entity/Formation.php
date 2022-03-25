<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_formation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_ecole;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_domaine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resultat;

    public function getIdFormation(): ?int
    {
        return $this->id_formation;
    }

    public function getNomEcole(): ?string
    {
        return $this->nom_ecole;
    }

    public function setNomEcole(string $nom_ecole): self
    {
        $this->nom_ecole = $nom_ecole;

        return $this;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nom_diplome;
    }

    public function setNomDiplome(string $nom_diplome): self
    {
        $this->nom_diplome = $nom_diplome;

        return $this;
    }

    public function getNomDomaine(): ?string
    {
        return $this->nom_domaine;
    }

    public function setNomDomaine(string $nom_domaine): self
    {
        $this->nom_domaine = $nom_domaine;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->date_debut;
    }

    public function setDateDebut(string $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->date_fin;
    }

    public function setDateFin(string $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }
}
