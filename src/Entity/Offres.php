<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresRepository::class)
 */
class Offres
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
    private $Type;

    /**
     * @ORM\OneToMany(targetEntity=Offresgroupes::class, mappedBy="Offresgroupes")
     */
    private $offresgroupes;

    /**
     * @ORM\OneToMany(targetEntity=Offresindividuel::class, mappedBy="Offresindividuel")
     */
    private $offresindividuels;

    public function __construct()
    {
        $this->offresgroupes = new ArrayCollection();
        $this->offresindividuels = new ArrayCollection();
    }
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
    public function getType(): ?string
    {
        return $this->Type;
    }
 /**
  * @param string $Type
    *@return Offres
  */
    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection|Offresgroupes[]
     */
    public function getOffresgroupes(): Collection
    {
        return $this->offresgroupes;
    }

    public function addOffresgroupe(Offresgroupes $offresgroupe): self
    {
        if (!$this->offresgroupes->contains($offresgroupe)) {
            $this->offresgroupes[] = $offresgroupe;
            $offresgroupe->setOffresgroupes($this);
        }

        return $this;
    }

    public function removeOffresgroupe(Offresgroupes $offresgroupe): self
    {
        if ($this->offresgroupes->removeElement($offresgroupe)) {
            // set the owning side to null (unless already changed)
            if ($offresgroupe->getOffresgroupes() === $this) {
                $offresgroupe->setOffresgroupes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Offresindividuel[]
     */
    public function getOffresindividuels(): Collection
    {
        return $this->offresindividuels;
    }

    public function addOffresindividuel(Offresindividuel $offresindividuel): self
    {
        if (!$this->offresindividuels->contains($offresindividuel)) {
            $this->offresindividuels[] = $offresindividuel;
            $offresindividuel->setOffresindividuel($this);
        }

        return $this;
    }

    public function removeOffresindividuel(Offresindividuel $offresindividuel): self
    {
        if ($this->offresindividuels->removeElement($offresindividuel)) {
            // set the owning side to null (unless already changed)
            if ($offresindividuel->getOffresindividuel() === $this) {
                $offresindividuel->setOffresindividuel(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->Type;
}
}