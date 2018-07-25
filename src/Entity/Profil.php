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
     * @ORM\Column(type="string", nullable=true)
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

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sale;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sucre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $amer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $acide;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $epice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sucresale;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegetalien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegetarien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $omnivore;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $carnivore;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $halal;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cacher;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autre;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fastfood;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $slowfood;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bourguignon;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $paella;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nouille;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tiepboudien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $macncheese;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tajine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pouletcurry;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gluten;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fruitsdemer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $oeuf;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $arachide;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $soja;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lait;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fruitsacoques;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autreintolerance;


    public function __construct()
    {
        $this->reservation = new ArrayCollection();
        $this->proposition = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
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

    public function getSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(?bool $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getSucre(): ?bool
    {
        return $this->sucre;
    }

    public function setSucre(?bool $sucre): self
    {
        $this->sucre = $sucre;

        return $this;
    }

    public function getAmer(): ?bool
    {
        return $this->amer;
    }

    public function setAmer(?bool $amer): self
    {
        $this->amer = $amer;

        return $this;
    }

    public function getAcide(): ?bool
    {
        return $this->acide;
    }

    public function setAcide(?bool $acide): self
    {
        $this->acide = $acide;

        return $this;
    }

    public function getEpice(): ?bool
    {
        return $this->epice;
    }

    public function setEpice(?bool $epice): self
    {
        $this->epice = $epice;

        return $this;
    }

    public function getSucresale(): ?bool
    {
        return $this->sucresale;
    }

    public function setSucresale(?bool $sucresale): self
    {
        $this->sucresale = $sucresale;

        return $this;
    }

    public function getVegetalien(): ?bool
    {
        return $this->vegetalien;
    }

    public function setVegetalien(?bool $vegetalien): self
    {
        $this->vegetalien = $vegetalien;

        return $this;
    }

    public function getVegetarien(): ?bool
    {
        return $this->vegetarien;
    }

    public function setVegetarien(?bool $vegetarien): self
    {
        $this->vegetarien = $vegetarien;

        return $this;
    }

    public function getOmnivore(): ?bool
    {
        return $this->omnivore;
    }

    public function setOmnivore(?bool $omnivore): self
    {
        $this->omnivore = $omnivore;

        return $this;
    }

    public function getCarnivore(): ?bool
    {
        return $this->carnivore;
    }

    public function setCarnivore(?bool $carnivore): self
    {
        $this->carnivore = $carnivore;

        return $this;
    }

    public function getHalal(): ?bool
    {
        return $this->halal;
    }

    public function setHalal(?bool $halal): self
    {
        $this->halal = $halal;

        return $this;
    }

    public function getCacher(): ?bool
    {
        return $this->cacher;
    }

    public function setCacher(?bool $cacher): self
    {
        $this->cacher = $cacher;

        return $this;
    }

    public function getAutre(): ?bool
    {
        return $this->autre;
    }

    public function setAutre(?bool $autre): self
    {
        $this->autre = $autre;

        return $this;
    }

    public function getFastfood(): ?bool
    {
        return $this->fastfood;
    }

    public function setFastfood(?bool $fastfood): self
    {
        $this->fastfood = $fastfood;

        return $this;
    }

    public function getSlowfood(): ?bool
    {
        return $this->slowfood;
    }

    public function setSlowfood(?bool $slowfood): self
    {
        $this->slowfood = $slowfood;

        return $this;
    }

    public function getBourguignon(): ?bool
    {
        return $this->bourguignon;
    }

    public function setBourguignon(?bool $bourguignon): self
    {
        $this->bourguignon = $bourguignon;

        return $this;
    }

    public function getPaella(): ?bool
    {
        return $this->paella;
    }

    public function setPaella(?bool $paella): self
    {
        $this->paella = $paella;

        return $this;
    }

    public function getNouille(): ?bool
    {
        return $this->nouille;
    }

    public function setNouille(?bool $nouille): self
    {
        $this->nouille = $nouille;

        return $this;
    }

    public function getTiepboudien(): ?bool
    {
        return $this->tiepboudien;
    }

    public function setTiepboudien(?bool $tiepboudien): self
    {
        $this->tiepboudien = $tiepboudien;

        return $this;
    }

    public function getMacncheese(): ?bool
    {
        return $this->macncheese;
    }

    public function setMacncheese(?bool $macncheese): self
    {
        $this->macncheese = $macncheese;

        return $this;
    }

    public function getTajine(): ?bool
    {
        return $this->tajine;
    }

    public function setTajine(?bool $tajine): self
    {
        $this->tajine = $tajine;

        return $this;
    }

    public function getPouletcurry(): ?bool
    {
        return $this->pouletcurry;
    }

    public function setPouletcurry(?bool $pouletcurry): self
    {
        $this->pouletcurry = $pouletcurry;

        return $this;
    }

    public function getGluten(): ?bool
    {
        return $this->gluten;
    }

    public function setGluten(?bool $gluten): self
    {
        $this->gluten = $gluten;

        return $this;
    }

    public function getFruitsdemer(): ?bool
    {
        return $this->fruitsdemer;
    }

    public function setFruitsdemer(?bool $fruitsdemer): self
    {
        $this->fruitsdemer = $fruitsdemer;

        return $this;
    }

    public function getOeuf(): ?bool
    {
        return $this->oeuf;
    }

    public function setOeuf(?bool $oeuf): self
    {
        $this->oeuf = $oeuf;

        return $this;
    }

    public function getArachide(): ?bool
    {
        return $this->arachide;
    }

    public function setArachide(?bool $arachide): self
    {
        $this->arachide = $arachide;

        return $this;
    }

    public function getSoja(): ?bool
    {
        return $this->soja;
    }

    public function setSoja(?bool $soja): self
    {
        $this->soja = $soja;

        return $this;
    }

    public function getLait(): ?bool
    {
        return $this->lait;
    }

    public function setLait(?bool $lait): self
    {
        $this->lait = $lait;

        return $this;
    }

    public function getFruitsacoques(): ?bool
    {
        return $this->fruitsacoques;
    }

    public function setFruitsacoques(?bool $fruitsacoques): self
    {
        $this->fruitsacoques = $fruitsacoques;

        return $this;
    }

    public function getAutreintolerance(): ?bool
    {
        return $this->autreintolerance;
    }

    public function setAutreintolerance(?bool $autreintolerance): self
    {
        $this->autreintolerance = $autreintolerance;

        return $this;
    }
    
}
