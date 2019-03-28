<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StructureRepository")
 */
class Structure
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
    private $structure_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_location;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_city;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_zipcode;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_type;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_siret;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_nbspace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_typefood;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $structure_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $structure_updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_statuspaiement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Opinion", mappedBy="opinion_id_structure")
     */
    private $opinions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PivotChildStructure", mappedBy="Pivot_id_structure")
     */
    private $pivotChildStructures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_photo;


    public function __construct()
    {
        $this->opinions = new ArrayCollection();
        $this->pivotChildStructures = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructureName(): ?string
    {
        return $this->structure_name;
    }

    public function setStructureName(string $structure_name): self
    {
        $this->structure_name = $structure_name;

        return $this;
    }

    public function getStructureLocation(): ?string
    {
        return $this->structure_location;
    }

    public function setStructureLocation(string $structure_location): self
    {
        $this->structure_location = $structure_location;

        return $this;
    }

    public function getStructureCity(): ?string
    {
        return $this->structure_city;
    }

    public function setStructureCity(string $structure_city): self
    {
        $this->structure_city = $structure_city;

        return $this;
    }

    public function getStructureZipcode(): ?int
    {
        return $this->structure_zipcode;
    }

    public function setStructureZipcode(int $structure_zipcode): self
    {
        $this->structure_zipcode = $structure_zipcode;

        return $this;
    }

    public function getStructurePhone(): ?int
    {
        return $this->structure_phone;
    }

    public function setStructurePhone(int $structure_phone): self
    {
        $this->structure_phone = $structure_phone;

        return $this;
    }

    public function getStructureType(): ?string
    {
        return $this->structure_type;
    }

    public function setStructureType(string $structure_type): self
    {
        $this->structure_type = $structure_type;

        return $this;
    }

    public function getStructureSiret(): ?int
    {
        return $this->structure_siret;
    }

    public function setStructureSiret(int $structure_siret): self
    {
        $this->structure_siret = $structure_siret;

        return $this;
    }

    public function getStructureNbspace(): ?int
    {
        return $this->structure_nbspace;
    }

    public function setStructureNbspace(int $structure_nbspace): self
    {
        $this->structure_nbspace = $structure_nbspace;

        return $this;
    }

    public function getStructureTypefood(): ?string
    {
        return $this->structure_typefood;
    }

    public function setStructureTypefood(string $structure_typefood): self
    {
        $this->structure_typefood = $structure_typefood;

        return $this;
    }

    public function getStructureMail(): ?string
    {
        return $this->structure_mail;
    }

    public function setStructureMail(string $structure_mail): self
    {
        $this->structure_mail = $structure_mail;

        return $this;
    }

    public function getStructurePassword(): ?string
    {
        return $this->structure_password;
    }

    public function setStructurePassword(string $structure_password): self
    {
        $this->structure_password = $structure_password;

        return $this;
    }

    public function getStructureToken(): ?string
    {
        return $this->structure_token;
    }

    public function setStructureToken(string $structure_token): self
    {
        $this->structure_token = $structure_token;

        return $this;
    }

    public function getStructureCreatedAt(): ?\DateTimeInterface
    {
        return $this->structure_created_at;
    }

    public function setStructureCreatedAt(\DateTimeInterface $structure_created_at): self
    {
        $this->structure_created_at = $structure_created_at;

        return $this;
    }

    public function getStructureUpdatedAt(): ?\DateTimeInterface
    {
        return $this->structure_updated_at;
    }

    public function setStructureUpdatedAt(?\DateTimeInterface $structure_updated_at): self
    {
        $this->structure_updated_at = $structure_updated_at;

        return $this;
    }

    public function getStructureStatuspaiement(): ?string
    {
        return $this->structure_statuspaiement;
    }

    public function setStructureStatuspaiement(string $structure_statuspaiement): self
    {
        $this->structure_statuspaiement = $structure_statuspaiement;

        return $this;
    }

    /**
     * @return Collection|Opinion[]
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinion $opinion): self
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions[] = $opinion;
            $opinion->setOpinionIdStructure($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->contains($opinion)) {
            $this->opinions->removeElement($opinion);
            // set the owning side to null (unless already changed)
            if ($opinion->getOpinionIdStructure() === $this) {
                $opinion->setOpinionIdStructure(null);
            }
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
            $pivotChildStructure->addPivotIdStructure($this);
        }

        return $this;
    }

    public function removePivotChildStructure(PivotChildStructure $pivotChildStructure): self
    {
        if ($this->pivotChildStructures->contains($pivotChildStructure)) {
            $this->pivotChildStructures->removeElement($pivotChildStructure);
            $pivotChildStructure->removePivotIdStructure($this);
        }

        return $this;
    }

    public function getStructurePhoto(): ?string
    {
        return $this->structure_photo;
    }

    public function setStructurePhoto(string $structure_photo): self
    {
        $this->structure_photo = $structure_photo;

        return $this;
    }

}
