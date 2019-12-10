<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BuildingRepository")
 */
class Building
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;


    /**
     * @ORM\Column(type="integer")
     */
    private $xCoord;

    /**
     * @ORM\Column(type="integer")
     */
    private $yCoord;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Company", mappedBy="building")
     */
    private $company;

    public function __construct()
    {
        $this->company = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    

    public function getXCoord(): ?int
    {
        return $this->xCoord;
    }

    public function setXCoord(int $xCoord): self
    {
        $this->xCoord = $xCoord;

        return $this;
    }

    public function getYCoord(): ?int
    {
        return $this->yCoord;
    }

    public function setYCoord(int $yCoord): self
    {
        $this->yCoord = $yCoord;

        return $this;
    }

    /**
     * @return Collection|Company[]
     */
    public function getCompany(): Collection
    {
        return $this->company;
    }

    public function addCompany(Company $company): self
    {
        if (!$this->company->contains($company)) {
            $this->company[] = $company;
            $company->setBuilding($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): self
    {
        if ($this->company->contains($company)) {
            $this->company->removeElement($company);
            // set the owning side to null (unless already changed)
            if ($company->getBuilding() === $this) {
                $company->setBuilding(null);
            }
        }

        return $this;
    }
}
