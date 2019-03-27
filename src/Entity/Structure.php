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
     * @ORM\Column(type="string", length=255)
     */
    private $structure_type;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_SIRET;

    /**
     * @ORM\Column(type="integer")
     */
    private $structure_numberspace;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_type_alimentation;

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
    private $strucutre_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_token;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $structure_status_paiement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AuthorizeUser", mappedBy="authorize_id_structure")
     */
    private $authorizeUsers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PivotProChild", mappedBy="pivot_id_structure")
     */
    private $pivotProChildren;

    public function __construct()
    {
        $this->authorizeUsers = new ArrayCollection();
        $this->pivotProChildren = new ArrayCollection();
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

    public function getStructureType(): ?string
    {
        return $this->structure_type;
    }

    public function setStructureType(string $structure_type): self
    {
        $this->structure_type = $structure_type;

        return $this;
    }

    public function getStructureSIRET(): ?int
    {
        return $this->structure_SIRET;
    }

    public function setStructureSIRET(int $structure_SIRET): self
    {
        $this->structure_SIRET = $structure_SIRET;

        return $this;
    }

    public function getStructureNumberspace(): ?int
    {
        return $this->structure_numberspace;
    }

    public function setStructureNumberspace(int $structure_numberspace): self
    {
        $this->structure_numberspace = $structure_numberspace;

        return $this;
    }

    public function getStructureTypeAlimentation(): ?string
    {
        return $this->structure_type_alimentation;
    }

    public function setStructureTypeAlimentation(string $structure_type_alimentation): self
    {
        $this->structure_type_alimentation = $structure_type_alimentation;

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

    public function getStrucutreMail(): ?string
    {
        return $this->strucutre_mail;
    }

    public function setStrucutreMail(string $strucutre_mail): self
    {
        $this->strucutre_mail = $strucutre_mail;

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

    public function getStructureStatusPaiement(): ?string
    {
        return $this->structure_status_paiement;
    }

    public function setStructureStatusPaiement(string $structure_status_paiement): self
    {
        $this->structure_status_paiement = $structure_status_paiement;

        return $this;
    }

    /**
     * @return Collection|AuthorizeUser[]
     */
    public function getAuthorizeUsers(): Collection
    {
        return $this->authorizeUsers;
    }

    public function addAuthorizeUser(AuthorizeUser $authorizeUser): self
    {
        if (!$this->authorizeUsers->contains($authorizeUser)) {
            $this->authorizeUsers[] = $authorizeUser;
            $authorizeUser->setAuthorizeIdStructure($this);
        }

        return $this;
    }

    public function removeAuthorizeUser(AuthorizeUser $authorizeUser): self
    {
        if ($this->authorizeUsers->contains($authorizeUser)) {
            $this->authorizeUsers->removeElement($authorizeUser);
            // set the owning side to null (unless already changed)
            if ($authorizeUser->getAuthorizeIdStructure() === $this) {
                $authorizeUser->setAuthorizeIdStructure(null);
            }
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
            $pivotProChild->addPivotIdStructure($this);
        }

        return $this;
    }

    public function removePivotProChild(PivotProChild $pivotProChild): self
    {
        if ($this->pivotProChildren->contains($pivotProChild)) {
            $this->pivotProChildren->removeElement($pivotProChild);
            $pivotProChild->removePivotIdStructure($this);
        }

        return $this;
    }
}
