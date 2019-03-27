<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiseaseRepository")
 */
class Disease
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
    private $disease_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disease_therapy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disease_severity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $disease_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $disease_updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="disease")
     */
    private $disease_id_child;

    public function __construct()
    {
        $this->disease_id_child = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiseaseName(): ?string
    {
        return $this->disease_name;
    }

    public function setDiseaseName(string $disease_name): self
    {
        $this->disease_name = $disease_name;

        return $this;
    }

    public function getDiseaseTherapy(): ?string
    {
        return $this->disease_therapy;
    }

    public function setDiseaseTherapy(?string $disease_therapy): self
    {
        $this->disease_therapy = $disease_therapy;

        return $this;
    }

    public function getDiseaseSeverity(): ?string
    {
        return $this->disease_severity;
    }

    public function setDiseaseSeverity(?string $disease_severity): self
    {
        $this->disease_severity = $disease_severity;

        return $this;
    }

    public function getDiseaseCreatedAt(): ?\DateTimeInterface
    {
        return $this->disease_created_at;
    }

    public function setDiseaseCreatedAt(\DateTimeInterface $disease_created_at): self
    {
        $this->disease_created_at = $disease_created_at;

        return $this;
    }

    public function getDiseaseUpdatedAt(): ?\DateTimeInterface
    {
        return $this->disease_updated_at;
    }

    public function setDiseaseUpdatedAt(?\DateTimeInterface $disease_updated_at): self
    {
        $this->disease_updated_at = $disease_updated_at;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getDiseaseIdChild(): Collection
    {
        return $this->disease_id_child;
    }

    public function addDiseaseIdChild(Child $diseaseIdChild): self
    {
        if (!$this->disease_id_child->contains($diseaseIdChild)) {
            $this->disease_id_child[] = $diseaseIdChild;
        }

        return $this;
    }

    public function removeDiseaseIdChild(Child $diseaseIdChild): self
    {
        if ($this->disease_id_child->contains($diseaseIdChild)) {
            $this->disease_id_child->removeElement($diseaseIdChild);
        }

        return $this;
    }
}
