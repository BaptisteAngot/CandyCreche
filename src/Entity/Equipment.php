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
    public $equipment_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $equipment_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $equipment_updated_at;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="equipment")
     */
    private $equipment_id_child;

    public function __construct()
    {
        $this->equipment_id_child = new ArrayCollection();
        $this->equipment_created_at = new \DateTime('now',new \DateTimeZone('Europe/Paris'));
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
    public function getEquipmentIdChild(): Collection
    {
        return $this->equipment_id_child;
    }

    public function addEquipmentIdChild(Child $equipmentIdChild): self
    {
        if (!$this->equipment_id_child->contains($equipmentIdChild)) {
            $this->equipment_id_child[] = $equipmentIdChild;
        }

        return $this;
    }

    public function removeEquipmentIdChild(Child $equipmentIdChild): self
    {
        if ($this->equipment_id_child->contains($equipmentIdChild)) {
            $this->equipment_id_child->removeElement($equipmentIdChild);
        }

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
