<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\IsTrue;

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
     * @ORM\Column(type="array")
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
    private $mdpconfirm;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $phone;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Proposition", inversedBy="user")
     */
    private $proposition;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Profil", mappedBy="user", cascade={"persist", "remove"})
     */
    private $profil;



    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('prenom', new Assert\NotBlank(array('message' => 'Il faut saisir ton prénom')));
        $metadata->addPropertyConstraint('nom', new Assert\NotBlank(array('message' => 'Il faut saisir ton nom')));
        $metadata->addPropertyConstraint('genre', new Assert\NotBlank(array('message' => 'Il faut cocher une des cases')));
        $metadata->addPropertyConstraint('datenaissance', new Assert\NotBlank(array('message' => 'Il faut remplir ta date de naissance')));
        $metadata->addPropertyConstraint('pseudo', new Assert\NotBlank(array('message' => 'Il faut saisir ton pseudo')));
        $metadata->addPropertyConstraint('email', new Assert\NotBlank(array('message' => 'Il faut saisir ton adresse mail')));
        $metadata->addPropertyConstraint('mdp', new Assert\NotBlank(array('message' => 'Il faut saisir ton mot de passe')));
        $metadata->addPropertyConstraint('mdpconfirm', new Assert\NotBlank(array('message' => 'Il faut saisir à nouveau ton mot de passe ')));
        $metadata->addPropertyConstraint('phone', new Assert\NotBlank(array('message' => 'Il faut saisir ton n° de téléphone/portable')));
        $metadata->addPropertyConstraint('adresse', new Assert\NotBlank(array('message' => 'Il faut saisir ton adresse')));
        $metadata->addPropertyConstraint('ville', new Assert\NotBlank(array('message' => 'Il faut saisir ta ville')));
        $metadata->addPropertyConstraint('cp', new Assert\NotBlank(array('message' => 'Il faut saisir ton code postal')));

        $metadata->addPropertyConstraint('prenom', new Assert\Length(array(
            'min'        => 3,
            'max'        => 100,
            'minMessage' => 'Il te faut saisir un prenom un peu moins long',
            'maxMessage' => 'Il te faut saisir un prenom un peu plus court',
        )));
        $metadata->addPropertyConstraint('nom', new Assert\Length(array(
            'min'        => 3,
            'max'        => 100,
            'minMessage' => 'Il te faut saisir un nom un peu moins long',
            'maxMessage' => 'Il te faut saisir un nom un peu plus court',
        )));
        $metadata->addPropertyConstraint('genre', new Assert\Choice(array(
            'choices' => array('Femme', 'Homme'),
            'message' => 'Choisis ton genre',
        )));

    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getPrenom(): ?__toString
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

    public function getMdpconfirm(): ?string
    {
        return $this->mdpconfirm;
    }

    public function setMdpconfirm(string $mdpconfirm): self
    {
        $this->mdpconfirm = $mdpconfirm;

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

    public function getProposition(): ?Proposition
    {
        return $this->proposition;
    }

    public function setProposition(?Proposition $proposition): self
    {
        $this->proposition = $proposition;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(Profil $profil): self
    {
        $this->profil = $profil;

        // set the owning side of the relation if necessary
        if ($this !== $profil->getUser()) {
            $profil->setUser($this);
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->prenom;
        return (string) $this->nom;
        return (string) $this->genre;
        return (string) $this->pseudo;
        return (string) $this->email;
        return (string) $this->mdp;
        return (string) $this->mdpconfirm;
        return (string) $this->phone;
        return (string) $this->adresse;
        return (string) $this->ville;
        return (string) $this->cp;
    }
}
