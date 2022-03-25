<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
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
    private $nom_competence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_competence;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image_competence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetence(): ?string
    {
        return $this->nom_competence;
    }

    public function setNomCompetence(string $nom_competence): self
    {
        $this->nom_competence = $nom_competence;

        return $this;
    }

    public function getTypeCompetence(): ?string
    {
        return $this->type_competence;
    }

    public function setTypeCompetence(?string $type_competence): self
    {
        $this->type_competence = $type_competence;

        return $this;
    }

    public function getImageCompetence(): ?string
    {
        return $this->image_competence;
    }

    public function setImageCompetence(?string $image_competence): self
    {
        $this->image_competence = $image_competence;

        return $this;
    }
}
