<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use App\Repository\AdresseRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
#[ORM\Table(name: '`adresse`')]
class Adresse{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length:180)]
    private ?string $rue = null;

    #[ORM\Column(type:'integer')]
    private ?int $numeroRue = null;

    #[ORM\Column(length:180)]
    private ?string $codePostal = null;

    #[ORM\Column(length:180)]
    private ?string $ville = null;

    #[ORM\Column(length:180)]
    private ?string $type = null;

    #[ORM\ManyToOne(targetEntity:User::class, inversedBy:"adresses")]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;
        return $this;
    }

    public function getNumeroRue(): ?int
    {
        return $this->numeroRue;
    }

    public function setNumeroRue(int $numeroRue): self
    {
        $this->numeroRue = $numeroRue;
        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;
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
    public function getUser(): ?User
    {
        return $this->user;
    }
    
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
    
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

}