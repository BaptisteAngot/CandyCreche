<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentRepository")
 */
class Equipment
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
    private $equipment_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $equipment_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $equipment_updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="equiment")
     */
    private $equipment_id_enfant;

    public function __construct()
    {
        $this->equipment_id_enfant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentName(): ?string
    {
        return $this->equipment_name;
    }

    public function setEquipmentName(string $equipment_name): self
    {
        $this->equipment_name = $equipment_name;

        return $this;
    }

    public function getEquipmentCreatedAt(): ?\DateTimeInterface
    {
        return $this->equipment_created_at;
    }

    public function setEquipmentCreatedAt(\DateTimeInterface $equipment_created_at): self
    {
        $this->equipment_created_at = $equipment_created_at;

        return $this;
    }

    public function getEquipmentUpdatedAt(): ?\DateTimeInterface
    {
        return $this->equipment_updated_at;
    }

    public function setEquipmentUpdatedAt(?\DateTimeInterface $equipment_updated_at): self
    {
        $this->equipment_updated_at = $equipment_updated_at;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getEquipmentIdEnfant(): Collection
    {
        return $this->equipment_id_enfant;
    }

    public function addEquipmentIdEnfant(Child $equipmentIdEnfant): self
    {
        if (!$this->equipment_id_enfant->contains($equipmentIdEnfant)) {
            $this->equipment_id_enfant[] = $equipmentIdEnfant;
        }

        return $this;
    }

    public function removeEquipmentIdEnfant(Child $equipmentIdEnfant): self
    {
        if ($this->equipment_id_enfant->contains($equipmentIdEnfant)) {
            $this->equipment_id_enfant->removeElement($equipmentIdEnfant);
        }

        return $this;
    }
}
