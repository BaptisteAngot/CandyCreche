<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParentsRepository")
 * @UniqueEntity(fields={"parents_mail"}, errorPath="parents_mail", message="Cet adresse mail existe déjà")
 */
class Parents implements UserInterface
{

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

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
    private $parents_mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parents_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $parents_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $parents_updated_at;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Child", mappedBy="Child_id_parent")
     */
    private $children;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Opinion", mappedBy="opinion_id_parents")
     */
    private $opinions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parents_token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parents_photo;


    public function __construct()
    {
        $this->parents_token = bin2hex(random_bytes(50));
        $this->parents_created_at = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->children = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->parents_mail;
    }

    public function getPassword()
    {
        return $this->parents_password;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function getRoles() : array
    {
        return $this->roles;

        $roles = ['ROLE_PARENT'];

        return array_unique($roles);
    }

    public function eraseCredentials()
    {
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

    public function getParentsMail(): ?string
    {
        return $this->parents_mail;
    }

    public function setParentsMail(string $parents_mail): self
    {
        $this->parents_mail = $parents_mail;

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

    public function getParentsCreatedAt(): ?\DateTimeInterface
    {
        return $this->parents_created_at;
    }

    public function setParentsCreatedAt(\DateTimeInterface $parents_created_at): self
    {
        $this->parents_created_at = $parents_created_at;

        return $this;
    }

    public function getParentsUpdatedAt(): ?\DateTimeInterface
    {
        return $this->parents_updated_at;
    }

    public function setParentsUpdatedAt(?\DateTimeInterface $parents_updated_at): self
    {
        $this->parents_updated_at = $parents_updated_at;

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setChildIdParent($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getChildIdParent() === $this) {
                $child->setChildIdParent(null);
            }
        }

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
            $opinion->setOpinionIdParents($this);
        }

        return $this;
    }

    public function removeOpinion(Opinion $opinion): self
    {
        if ($this->opinions->contains($opinion)) {
            $this->opinions->removeElement($opinion);
            // set the owning side to null (unless already changed)
            if ($opinion->getOpinionIdParents() === $this) {
                $opinion->setOpinionIdParents(null);
            }
        }

        return $this;
    }

    public function getParentsToken(): ?string
    {
        return $this->parents_token;
    }

    public function setParentsToken(string $parents_token): self
    {
        $this->parents_token = $parents_token;

        return $this;
    }

    public function getParentsPhoto(): ?string
    {
        return $this->parents_photo;
    }

    public function setParentsPhoto(?string $parents_photo): self
    {
        $this->parents_photo = $parents_photo;

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }

}
