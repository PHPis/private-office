<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
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
    private $name;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $phone = [];

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Building", inversedBy="companies")
     */
    private $building;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rubric", inversedBy="companies")
     */
    private $rubric;

    public function __construct()
    {
        $this->building = new ArrayCollection();
        $this->rubric = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?array
    {
        return $this->phone;
    }

    public function setPhone(?array $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|Building[]
     */
    public function getBuilding(): Collection
    {
        return $this->building;
    }

    public function addBuilding(Building $building): self
    {
        if (!$this->building->contains($building)) {
            $this->building[] = $building;
        }

        return $this;
    }

    public function removeBuilding(Building $building): self
    {
        if ($this->building->contains($building)) {
            $this->building->removeElement($building);
        }

        return $this;
    }

    /**
     * @return Collection|Rubric[]
     */
    public function getRubric(): Collection
    {
        return $this->rubric;
    }

    public function addRubric(Rubric $rubric): self
    {
        if (!$this->rubric->contains($rubric)) {
            $this->rubric[] = $rubric;
        }

        return $this;
    }

    public function removeRubric(Rubric $rubric): self
    {
        if ($this->rubric->contains($rubric)) {
            $this->rubric->removeElement($rubric);
        }

        return $this;
    }
}
