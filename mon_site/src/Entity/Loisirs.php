<?php

namespace App\Entity;

use App\Repository\LoisirsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoisirsRepository::class)
 */
class Loisirs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image_loisirs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_loisirs;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_loisirs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageLoisirs(): ?string
    {
        return $this->image_loisirs;
    }

    public function setImageLoisirs(?string $image_loisirs): self
    {
        $this->image_loisirs = $image_loisirs;

        return $this;
    }

    public function getNomLoisirs(): ?string
    {
        return $this->nom_loisirs;
    }

    public function setNomLoisirs(string $nom_loisirs): self
    {
        $this->nom_loisirs = $nom_loisirs;

        return $this;
    }

    public function getDescriptionLoisirs(): ?string
    {
        return $this->description_loisirs;
    }

    public function setDescriptionLoisirs(?string $description_loisirs): self
    {
        $this->description_loisirs = $description_loisirs;

        return $this;
    }
}
