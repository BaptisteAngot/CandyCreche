<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpinionRepository")
 */
class Opinion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="opinions")
     */
    private $opinion_id_parents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="opinions")
     */
    private $opinion_id_structure;

    /**
     * @ORM\Column(type="datetime")
     */
    private $opinion_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $opinion_updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $opinion_rate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $opinion_comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpinionIdParents(): ?Parents
    {
        return $this->opinion_id_parents;
    }

    public function setOpinionIdParents(?Parents $opinion_id_parents): self
    {
        $this->opinion_id_parents = $opinion_id_parents;

        return $this;
    }

    public function getOpinionIdStructure(): ?Structure
    {
        return $this->opinion_id_structure;
    }

    public function setOpinionIdStructure(?Structure $opinion_id_structure): self
    {
        $this->opinion_id_structure = $opinion_id_structure;

        return $this;
    }

    public function getOpinionCreatedAt(): ?\DateTimeInterface
    {
        return $this->opinion_created_at;
    }

    public function setOpinionCreatedAt(\DateTimeInterface $opinion_created_at): self
    {
        $this->opinion_created_at = $opinion_created_at;

        return $this;
    }

    public function getOpinionUpdatedAt(): ?\DateTimeInterface
    {
        return $this->opinion_updated_at;
    }

    public function setOpinionUpdatedAt(?\DateTimeInterface $opinion_updated_at): self
    {
        $this->opinion_updated_at = $opinion_updated_at;

        return $this;
    }

    public function getOpinionRate(): ?int
    {
        return $this->opinion_rate;
    }

    public function setOpinionRate(int $opinion_rate): self
    {
        $this->opinion_rate = $opinion_rate;

        return $this;
    }

    public function getOpinionComment(): ?string
    {
        return $this->opinion_comment;
    }

    public function setOpinionComment(?string $opinion_comment): self
    {
        $this->opinion_comment = $opinion_comment;

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
