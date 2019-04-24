<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
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
    private $Child_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Child_firstname;

    /**
     * @ORM\Column(type="integer")
     */
    private $Child_years;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Child_Others;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Child_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Child_updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="children")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Child_id_parent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Disease", mappedBy="disease_id_child")
     */
    private $diseases;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Allergy", mappedBy="allergy_id_child")
     */
    private $allergies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipment", mappedBy="equipment_id_child")
     */
    private $equipment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PivotChildStructure", mappedBy="Pivot_id_child")
     */
    private $pivotChildStructures;

    public function __construct()
    {
        $this->diseases = new ArrayCollection();
        $this->allergies = new ArrayCollection();
        $this->equipment = new ArrayCollection();
        $this->pivotChildStructures = new ArrayCollection();
        $this->Child_created_at = new \DateTime('now',new \DateTimeZone('Europe/Paris'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChildName(): ?string
    {
        return $this->Child_name;
    }

    public function setChildName(string $Child_name): self
    {
        $this->Child_name = $Child_name;

        return $this;
    }

    public function getChildFirstname(): ?string
    {
        return $this->Child_firstname;
    }

    public function setChildFirstname(string $Child_firstname): self
    {
        $this->Child_firstname = $Child_firstname;

        return $this;
    }

    public function getChildYears(): ?int
    {
        return $this->Child_years;
    }

    public function setChildYears(int $Child_years): self
    {
        $this->Child_years = $Child_years;

        return $this;
    }

    public function getChildOthers(): ?string
    {
        return $this->Child_Others;
    }

    public function setChildOthers(?string $Child_Others): self
    {
        $this->Child_Others = $Child_Others;

        return $this;
    }

    public function getChildCreatedAt(): ?\DateTimeInterface
    {
        return $this->Child_created_at;
    }

    public function setChildCreatedAt(\DateTimeInterface $Child_created_at): self
    {
        $this->Child_created_at = $Child_created_at;

        return $this;
    }

    public function getChildUpdatedAt(): ?\DateTimeInterface
    {
        return $this->Child_updated_at;
    }

    public function setChildUpdatedAt(?\DateTimeInterface $Child_updated_at): self
    {
        $this->Child_updated_at = $Child_updated_at;

        return $this;
    }

    public function getChildIdParent(): ?Parents
    {
        return $this->Child_id_parent;
    }

    public function getChildIdParentID(): ?Parents
    {
        return $this->Child_id_parent;
    }

    public function setChildIdParent(?Parents $Child_id_parent): self
    {
        $this->Child_id_parent = $Child_id_parent;

        return $this;
    }


    /**
     * @return Collection|Disease[]
     */
    public function getDiseases(): Collection
    {
        return $this->diseases;
    }

    public function addDisease(Disease $disease): self
    {
        if (!$this->diseases->contains($disease)) {
            $this->diseases[] = $disease;
            $disease->addDiseaseIdChild($this);
        }

        return $this;
    }

    public function removeDisease(Disease $disease): self
    {
        if ($this->diseases->contains($disease)) {
            $this->diseases->removeElement($disease);
            $disease->removeDiseaseIdChild($this);
        }

        return $this;
    }

    /**
     * @return Collection|Allergy[]
     */
    public function getAllergies(): Collection
    {
        return $this->allergies;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergies->contains($allergy)) {
            $this->allergies[] = $allergy;
            $allergy->addAllergyIdChild($this);
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        if ($this->allergies->contains($allergy)) {
            $this->allergies->removeElement($allergy);
            $allergy->removeAllergyIdChild($this);
        }

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipment(): Collection
    {
        return $this->equipment;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipment->contains($equipment)) {
            $this->equipment[] = $equipment;
            $equipment->addEquipmentIdChild($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipment->contains($equipment)) {
            $this->equipment->removeElement($equipment);
            $equipment->removeEquipmentIdChild($this);
        }

        return $this;
    }

    /**
     * @return Collection|PivotChildStructure[]
     */
    public function getPivotChildStructures(): Collection
    {
        return $this->pivotChildStructures;
    }

    public function addPivotChildStructure(PivotChildStructure $pivotChildStructure): self
    {
        if (!$this->pivotChildStructures->contains($pivotChildStructure)) {
            $this->pivotChildStructures[] = $pivotChildStructure;
            $pivotChildStructure->setPivotIdChild($this);
        }

        return $this;
    }

    public function removePivotChildStructure(PivotChildStructure $pivotChildStructure): self
    {
        if ($this->pivotChildStructures->contains($pivotChildStructure)) {
            $this->pivotChildStructures->removeElement($pivotChildStructure);
            // set the owning side to null (unless already changed)
            if ($pivotChildStructure->getPivotIdChild() === $this) {
                $pivotChildStructure->setPivotIdChild(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
