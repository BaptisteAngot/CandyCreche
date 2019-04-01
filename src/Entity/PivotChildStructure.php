<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PivotChildStructureRepository")
 */
class PivotChildStructure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Child", inversedBy="pivotChildStructures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Pivot_id_child;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Structure", inversedBy="pivotChildStructures")
     */
    private $Pivot_id_structure;

    public function __construct()
    {
        $this->Pivot_id_structure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPivotIdChild(): ?Child
    {
        return $this->Pivot_id_child;
    }

    public function setPivotIdChild(?Child $Pivot_id_child): self
    {
        $this->Pivot_id_child = $Pivot_id_child;

        return $this;
    }

    /**
     * @return Collection|Structure[]
     */
    public function getPivotIdStructure(): Collection
    {
        return $this->Pivot_id_structure;
    }

    public function addPivotIdStructure(Structure $pivotIdStructure): self
    {
        if (!$this->Pivot_id_structure->contains($pivotIdStructure)) {
            $this->Pivot_id_structure[] = $pivotIdStructure;
        }

        return $this;
    }

    public function removePivotIdStructure(Structure $pivotIdStructure): self
    {
        if ($this->Pivot_id_structure->contains($pivotIdStructure)) {
            $this->Pivot_id_structure->removeElement($pivotIdStructure);
        }

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }

}
