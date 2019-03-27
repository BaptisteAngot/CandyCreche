<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParentsRepository")
 */
class Parents
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
    private $parents_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parents_firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $parents_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Child", mappedBy="id_parent")
     */
    private $parents_id_child;

    public function __construct()
    {
        $this->parents_id_child = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentsName(): ?string
    {
        return $this->parents_name;
    }

    public function setParentsName(string $parents_name): self
    {
        $this->parents_name = $parents_name;

        return $this;
    }

    public function getParentsFirstname(): ?string
    {
        return $this->parents_firstname;
    }

    public function setParentsFirstname(string $parents_firstname): self
    {
        $this->parents_firstname = $parents_firstname;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getParentsPassword(): ?string
    {
        return $this->parents_password;
    }

    public function setParentsPassword(string $parents_password): self
    {
        $this->parents_password = $parents_password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getParentsIdChild(): Collection
    {
        return $this->parents_id_child;
    }

    public function addParentsIdChild(Child $parentsIdChild): self
    {
        if (!$this->parents_id_child->contains($parentsIdChild)) {
            $this->parents_id_child[] = $parentsIdChild;
            $parentsIdChild->setIdParent($this);
        }

        return $this;
    }

    public function removeParentsIdChild(Child $parentsIdChild): self
    {
        if ($this->parents_id_child->contains($parentsIdChild)) {
            $this->parents_id_child->removeElement($parentsIdChild);
            // set the owning side to null (unless already changed)
            if ($parentsIdChild->getIdParent() === $this) {
                $parentsIdChild->setIdParent(null);
            }
        }

        return $this;
    }
}
