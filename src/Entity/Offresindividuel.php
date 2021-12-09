<?php

namespace App\Entity;

use App\Repository\OffresindividuelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresindividuelRepository::class)
 */
class Offresindividuel
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
    private $descriptif_individuel;

    /**
     * @ORM\Column(type="date")
     */
    private $Expiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prix_individuel;

    /**
     * @ORM\ManyToOne(targetEntity=Offres::class, inversedBy="offresindividuels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Offresindividuel;

    /**
 * @return integer
 */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescriptifIndividuel(): ?string
    {
        return $this->descriptif_individuel;
    }
/**
  * @param string $descriptif_individuel
    *@return Offresindividuel
  */
    public function setDescriptifIndividuel(string $descriptif_individuel): self
    {
        $this->descriptif_individuel = $descriptif_individuel;

        return $this;
    }
/**
     * @return date
     */
    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->Expiration;
    }
/**
  * @param string $Expiration
    *@return Offresindividuel
  */
    public function setExpiration(\DateTimeInterface $Expiration): self
    {
        $this->Expiration = $Expiration;

        return $this;
    }
/**
     * @return string
     */
    public function getPrixIndividuel(): ?string
    {
        return $this->prix_individuel;
    }
 /**
  * @param string $prix_individuel
    *@return Offresindividuel
  */
    public function setPrixIndividuel(string $prix_individuel): self
    {
        $this->prix_individuel = $prix_individuel;

        return $this;
    }

    public function getOffresindividuel(): ?Offres
    {
        return $this->Offresindividuel;
    }

    public function setOffresindividuel(?Offres $Offresindividuel): self
    {
        $this->Offresindividuel = $Offresindividuel;

        return $this;

    }
    public function __toString(){
        
        return $this->descriptif_individuel;
}
}