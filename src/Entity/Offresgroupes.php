<?php

namespace App\Entity;

use App\Repository\OffresgroupesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresgroupesRepository::class)
 */
class Offresgroupes
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
    private $Descriptif_groupes;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_expiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prix_groupes;

    /**
     * @ORM\ManyToOne(targetEntity=Offres::class, inversedBy="offresgroupes")
     */
    private $Offresgroupes;
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
    public function getDescriptifGroupes(): ?string
    {
        return $this->Descriptif_groupes;
    }

    /**
  * @param string $Descriptif_groupes
    *@return Offresgroupes
  */
    public function setDescriptifGroupes(string $Descriptif_groupes): self
    {
        $this->Descriptif_groupes = $Descriptif_groupes;

        return $this;
    }
/**
     * @return date
     */
    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->Date_expiration;
    }

    /**
  * @param string $Date_expiration
    *@return Offresgroupes
  */
    public function setDateExpiration(\DateTimeInterface $Date_expiration): self
    {
        $this->Date_expiration = $Date_expiration;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrixGroupes(): ?string
    {
        return $this->Prix_groupes;
    }

    /**
  * @param string $Prix_groupes
    *@return Offresgroupes
  */
    public function setPrixGroupes(string $Prix_groupes): self
    {
        $this->Prix_groupes = $Prix_groupes;

        return $this;
    }

    public function getOffresgroupes(): ?Offres
    {
        return $this->Offresgroupes;
    }

    
    public function setOffresgroupes(?Offres $Offresgroupes): self
    {
        $this->Offresgroupes = $Offresgroupes;

        return $this;
    }
    public function __toString(){
        
        return $this->Descriptif_groupes;
}
}