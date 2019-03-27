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
    private $child_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $child_firstname;

    /**
     * @ORM\Column(type="integer")
     */
    private $child_years;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $child_other;

    /**
     * @ORM\Column(type="datetime")
     */
    private $child_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $child_updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="parents_id_child")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_parent;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Disease", mappedBy="disease_id_child")
     */
    private $disease;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Allergy", mappedBy="allergy_id_child")
     */
    private $allergy;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipment", mappedBy="equipment_id_enfant")
     */
    private $equiment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PivotProChild", mappedBy="pivot_child_id")
     */
    private $pivotProChildren;

    public function __construct()
    {
        $this->disease = new ArrayCollection();
        $this->allergy = new ArrayCollection();
        $this->equiment = new ArrayCollection();
        $this->pivotProChildren = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChildName(): ?string
    {
        return $this->child_name;
    }

    public function setChildName(string $child_name): self
    {
        $this->child_name = $child_name;

        return $this;
    }

    public function getChildFirstname(): ?string
    {
        return $this->child_firstname;
    }

    public function setChildFirstname(string $child_firstname): self
    {
        $this->child_firstname = $child_firstname;

        return $this;
    }

    public function getChildYears(): ?int
    {
        return $this->child_years;
    }

    public function setChildYears(int $child_years): self
    {
        $this->child_years = $child_years;

        return $this;
    }

    public function getChildOther(): ?string
    {
        return $this->child_other;
    }

    public function setChildOther(?string $child_other): self
    {
        $this->child_other = $child_other;

        return $this;
    }

    public function getChildCreatedAt(): ?\DateTimeInterface
    {
        return $this->child_created_at;
    }

    public function setChildCreatedAt(\DateTimeInterface $child_created_at): self
    {
        $this->child_created_at = $child_created_at;

        return $this;
    }

    public function getChildUpdatedAt(): ?\DateTimeInterface
    {
        return $this->child_updated_at;
    }

    public function setChildUpdatedAt(?\DateTimeInterface $child_updated_at): self
    {
        $this->child_updated_at = $child_updated_at;

        return $this;
    }

    public function getIdParent(): ?Parents
    {
        return $this->id_parent;
    }

    public function setIdParent(?Parents $id_parent): self
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    /**
     * @return Collection|Disease[]
     */
    public function getDisease(): Collection
    {
        return $this->disease;
    }

    public function addDisease(Disease $disease): self
    {
        if (!$this->disease->contains($disease)) {
            $this->disease[] = $disease;
            $disease->addDiseaseIdChild($this);
        }

        return $this;
    }

    public function removeDisease(Disease $disease): self
    {
        if ($this->disease->contains($disease)) {
            $this->disease->removeElement($disease);
            $disease->removeDiseaseIdChild($this);
        }

        return $this;
    }

    /**
     * @return Collection|Allergy[]
     */
    public function getAllergy(): Collection
    {
        return $this->allergy;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergy->contains($allergy)) {
            $this->allergy[] = $allergy;
            $allergy->addAllergyIdChild($this);
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        if ($this->allergy->contains($allergy)) {
            $this->allergy->removeElement($allergy);
            $allergy->removeAllergyIdChild($this);
        }

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquiment(): Collection
    {
        return $this->equiment;
    }

    public function addEquiment(Equipment $equiment): self
    {
        if (!$this->equiment->contains($equiment)) {
            $this->equiment[] = $equiment;
            $equiment->addEquipmentIdEnfant($this);
        }

        return $this;
    }

    public function removeEquiment(Equipment $equiment): self
    {
        if ($this->equiment->contains($equiment)) {
            $this->equiment->removeElement($equiment);
            $equiment->removeEquipmentIdEnfant($this);
        }

        return $this;
    }

    /**
     * @return Collection|PivotProChild[]
     */
    public function getPivotProChildren(): Collection
    {
        return $this->pivotProChildren;
    }

    public function addPivotProChild(PivotProChild $pivotProChild): self
    {
        if (!$this->pivotProChildren->contains($pivotProChild)) {
            $this->pivotProChildren[] = $pivotProChild;
            $pivotProChild->setPivotChildId($this);
        }

        return $this;
    }

    public function removePivotProChild(PivotProChild $pivotProChild): self
    {
        if ($this->pivotProChildren->contains($pivotProChild)) {
            $this->pivotProChildren->removeElement($pivotProChild);
            // set the owning side to null (unless already changed)
            if ($pivotProChild->getPivotChildId() === $this) {
                $pivotProChild->setPivotChildId(null);
            }
        }

        return $this;
    }


}
