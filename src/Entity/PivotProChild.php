<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PivotProChildRepository")
 */
class PivotProChild
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Child", inversedBy="pivotProChildren")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pivot_child_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Structure", inversedBy="pivotProChildren")
     */
    private $pivot_id_structure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pivot_status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pivot_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $pivot_updated_at;

    public function __construct()
    {
        $this->pivot_id_structure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPivotChildId(): ?Child
    {
        return $this->pivot_child_id;
    }

    public function setPivotChildId(?Child $pivot_child_id): self
    {
        $this->pivot_child_id = $pivot_child_id;

        return $this;
    }

    /**
     * @return Collection|Structure[]
     */
    public function getPivotIdStructure(): Collection
    {
        return $this->pivot_id_structure;
    }

    public function addPivotIdStructure(Structure $pivotIdStructure): self
    {
        if (!$this->pivot_id_structure->contains($pivotIdStructure)) {
            $this->pivot_id_structure[] = $pivotIdStructure;
        }

        return $this;
    }

    public function removePivotIdStructure(Structure $pivotIdStructure): self
    {
        if ($this->pivot_id_structure->contains($pivotIdStructure)) {
            $this->pivot_id_structure->removeElement($pivotIdStructure);
        }

        return $this;
    }

    public function getPivotStatus(): ?string
    {
        return $this->pivot_status;
    }

    public function setPivotStatus(string $pivot_status): self
    {
        $this->pivot_status = $pivot_status;

        return $this;
    }

    public function getPivotCreatedAt(): ?\DateTimeInterface
    {
        return $this->pivot_created_at;
    }

    public function setPivotCreatedAt(\DateTimeInterface $pivot_created_at): self
    {
        $this->pivot_created_at = $pivot_created_at;

        return $this;
    }

    public function getPivotUpdatedAt(): ?\DateTimeInterface
    {
        return $this->pivot_updated_at;
    }

    public function setPivotUpdatedAt(?\DateTimeInterface $pivot_updated_at): self
    {
        $this->pivot_updated_at = $pivot_updated_at;

        return $this;
    }
}
