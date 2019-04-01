<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorizeUserRepository")
 */
class AuthorizeUser
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
    private $Authorize_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Authorize_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Authorize_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Authorize_updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="authorizeUsers")
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorizeLogin(): ?string
    {
        return $this->Authorize_login;
    }

    public function setAuthorizeLogin(string $Authorize_login): self
    {
        $this->Authorize_login = $Authorize_login;

        return $this;
    }

    public function getAuthorizePassword(): ?string
    {
        return $this->Authorize_password;
    }

    public function setAuthorizePassword(string $Authorize_password): self
    {
        $this->Authorize_password = $Authorize_password;

        return $this;
    }

    public function getAuthorizeCreatedAt(): ?\DateTimeInterface
    {
        return $this->Authorize_created_at;
    }

    public function setAuthorizeCreatedAt(\DateTimeInterface $Authorize_created_at): self
    {
        $this->Authorize_created_at = $Authorize_created_at;

        return $this;
    }

    public function getAuthorizeUpdatedAt(): ?\DateTimeInterface
    {
        return $this->Authorize_updated_at;
    }

    public function setAuthorizeUpdatedAt(?\DateTimeInterface $Authorize_updated_at): self
    {
        $this->Authorize_updated_at = $Authorize_updated_at;

        return $this;
    }

    public function __toString()
    {
        return strval($this->id);
    }

    public function getRelation(): ?Structure
    {
        return $this->relation;
    }

    public function setRelation(?Structure $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
