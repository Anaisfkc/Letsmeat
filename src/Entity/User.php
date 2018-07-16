<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $genre;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $mdpConfirm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proposition", inversedBy="user")
     */
    private $propositions;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Preferences", mappedBy="user", cascade={"persist", "remove"})
     */
    private $preferences;

    public function getId()
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getMdpConfirm(): ?string
    {
        return $this->mdpConfirm;
    }

    public function setMdpConfirm(string $mdpConfirm): self
    {
        $this->mdpConfirm = $mdpConfirm;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPropositions(): ?Proposition
    {
        return $this->propositions;
    }

    public function setPropositions(?Proposition $propositions): self
    {
        $this->propositions = $propositions;

        return $this;
    }

    public function getPreferences(): ?Preferences
    {
        return $this->preferences;
    }

    public function setPreferences(Preferences $preferences): self
    {
        $this->preferences = $preferences;

        // set the owning side of the relation if necessary
        if ($this !== $preferences->getUser()) {
            $preferences->setUser($this);
        }

        return $this;
    }
}
