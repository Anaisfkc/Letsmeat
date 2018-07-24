<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

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
     * 
     * @ORM\Column(type="array")
     */
    private $saveurs;

    /**
     * 
     * @ORM\Column(type="array")
     */
    private $pratiquefood;

    /**
     * 
     * @ORM\Column(type="array")
     */
    private $prescriptionfood;

    /**
     * 
     * @ORM\Column(type="array")
     */
    private $typefood;

    /**
     * 
     * @ORM\Column(type="array")
     */
    private $recette;

    /**
     * 
     * @ORM\Column(type="array")
     */
    private $intolerance;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="profil")
     */
    private $reservation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Proposition", mappedBy="profil")
     */
    private $proposition;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="profil", cascade={"persist", "remove"})
     */
    private $user;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->proposition = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getSaveurs(): ?array
    {
        return $this->saveurs;
    }

    public function setSaveurs(array $saveurs): self
    {
        $this->saveurs = $saveurs;

        return $this;
    }

    public function getPratiquefood(): ?array
    {
        return $this->pratiquefood;
    }

    public function setPratiquefood(array $pratiquefood): self
    {
        $this->pratiquefood = $pratiquefood;

        return $this;
    }

    public function getPrescriptionfood(): ?array
    {
        return $this->prescriptionfood;
    }

    public function setPrescriptionfood(array $prescriptionfood): self
    {
        $this->prescriptionfood = $prescriptionfood;

        return $this;
    }

    public function getTypefood(): ?array
    {
        return $this->typefood;
    }

    public function setTypefood(array $typefood): self
    {
        $this->typefood = $typefood;

        return $this;
    }

    public function getRecette(): ?array
    {
        return $this->recette;
    }

    public function setRecette(array $recette): self
    {
        $this->recette = $recette;

        return $this;
    }

    public function getIntolerance(): ?array
    {
        return $this->intolerance;
    }

    public function setIntolerance(?array $intolerance): self
    {
        $this->intolerance = $intolerance;

        return $this;
    }

    public function getScore(): ?array
    {
        return $this->score;
    }

    public function setScore(?array $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservation->contains($reservation)) {
            $this->reservation[] = $reservation;
            $reservation->setProfil($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservation->contains($reservation)) {
            $this->reservation->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getProfil() === $this) {
                $reservation->setProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Proposition[]
     */
    public function getProposition(): Collection
    {
        return $this->proposition;
    }

    public function addProposition(Proposition $proposition): self
    {
        if (!$this->proposition->contains($proposition)) {
            $this->proposition[] = $proposition;
            $proposition->setProfil($this);
        }

        return $this;
    }

    public function removeProposition(Proposition $proposition): self
    {
        if ($this->proposition->contains($proposition)) {
            $this->proposition->removeElement($proposition);
            // set the owning side to null (unless already changed)
            if ($proposition->getProfil() === $this) {
                $proposition->setProfil(null);
            }
        }

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
