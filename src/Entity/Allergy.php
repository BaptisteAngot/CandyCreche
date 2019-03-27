<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AllergyRepository")
 */
class Allergy
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
    private $allergy_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allergy_therapy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $allergy_severity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $allergy_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $allergy_updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="allergy")
     */
    private $allergy_id_child;

    public function __construct()
    {
        $this->allergy_id_child = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllergyName(): ?string
    {
        return $this->allergy_name;
    }

    public function setAllergyName(string $allergy_name): self
    {
        $this->allergy_name = $allergy_name;

        return $this;
    }

    public function getAllergyTherapy(): ?string
    {
        return $this->allergy_therapy;
    }

    public function setAllergyTherapy(?string $allergy_therapy): self
    {
        $this->allergy_therapy = $allergy_therapy;

        return $this;
    }

    public function getAllergySeverity(): ?string
    {
        return $this->allergy_severity;
    }

    public function setAllergySeverity(?string $allergy_severity): self
    {
        $this->allergy_severity = $allergy_severity;

        return $this;
    }

    public function getAllergyCreatedAt(): ?\DateTimeInterface
    {
        return $this->allergy_created_at;
    }

    public function setAllergyCreatedAt(\DateTimeInterface $allergy_created_at): self
    {
        $this->allergy_created_at = $allergy_created_at;

        return $this;
    }

    public function getAllergyUpdatedAt(): ?\DateTimeInterface
    {
        return $this->allergy_updated_at;
    }

    public function setAllergyUpdatedAt(?\DateTimeInterface $allergy_updated_at): self
    {
        $this->allergy_updated_at = $allergy_updated_at;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getAllergyIdChild(): Collection
    {
        return $this->allergy_id_child;
    }

    public function addAllergyIdChild(Child $allergyIdChild): self
    {
        if (!$this->allergy_id_child->contains($allergyIdChild)) {
            $this->allergy_id_child[] = $allergyIdChild;
        }

        return $this;
    }

    public function removeAllergyIdChild(Child $allergyIdChild): self
    {
        if ($this->allergy_id_child->contains($allergyIdChild)) {
            $this->allergy_id_child->removeElement($allergyIdChild);
        }

        return $this;
    }
}
