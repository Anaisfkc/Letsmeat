<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfilRepository")
 */
class Profil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $saveurs;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pratiquefood;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $prescriptionfood;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $typefood;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $recette;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $intolerance;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $score;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="profil", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getSaveurs(): ?string
    {
        return $this->saveurs;
    }

    public function setSaveurs(string $saveurs): self
    {
        $this->saveurs = $saveurs;

        return $this;
    }

    public function getPratiquefood(): ?string
    {
        return $this->pratiquefood;
    }

    public function setPratiquefood(string $pratiquefood): self
    {
        $this->pratiquefood = $pratiquefood;

        return $this;
    }

    public function getPrescriptionfood(): ?string
    {
        return $this->prescriptionfood;
    }

    public function setPrescriptionfood(string $prescriptionfood): self
    {
        $this->prescriptionfood = $prescriptionfood;

        return $this;
    }

    public function getTypefood(): ?string
    {
        return $this->typefood;
    }

    public function setTypefood(string $typefood): self
    {
        $this->typefood = $typefood;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(string $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getIntolerance(): ?string
    {
        return $this->intolerance;
    }

    public function setIntolerance(?string $intolerance): self
    {
        $this->intolerance = $intolerance;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
