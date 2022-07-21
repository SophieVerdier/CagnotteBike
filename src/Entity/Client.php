<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numero_telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\OneToMany(mappedBy: 'Client', targetEntity: Cycle::class)]
    private Collection $cycles;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    public function __construct()
    {
        $this->cycles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numero_telephone;
    }

    public function setNumeroTelephone(?string $numero_telephone): self
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection<int, Cycle>
     */
    public function getCycles(): Collection
    {
        return $this->cycles;
    }

    public function addCycle(Cycle $cycle): self
    {
        if (!$this->cycles->contains($cycle)) {
            $this->cycles[] = $cycle;
            $cycle->setClient($this);
        }

        return $this;
    }

    public function removeCycle(Cycle $cycle): self
    {
        if ($this->cycles->removeElement($cycle)) {
            // set the owning side to null (unless already changed)
            if ($cycle->getClient() === $this) {
                $cycle->setClient(null);
            }
        }

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
