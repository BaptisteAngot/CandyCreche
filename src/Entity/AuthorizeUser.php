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
    private $authorize_login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $authorize_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $authorize_created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $authorize_updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure", inversedBy="authorizeUsers")
     */
    private $authorize_id_structure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorizeLogin(): ?string
    {
        return $this->authorize_login;
    }

    public function setAuthorizeLogin(string $authorize_login): self
    {
        $this->authorize_login = $authorize_login;

        return $this;
    }

    public function getAuthorizePassword(): ?string
    {
        return $this->authorize_password;
    }

    public function setAuthorizePassword(string $authorize_password): self
    {
        $this->authorize_password = $authorize_password;

        return $this;
    }

    public function getAuthorizeCreatedAt(): ?\DateTimeInterface
    {
        return $this->authorize_created_at;
    }

    public function setAuthorizeCreatedAt(\DateTimeInterface $authorize_created_at): self
    {
        $this->authorize_created_at = $authorize_created_at;

        return $this;
    }

    public function getAuthorizeUpdatedAt(): ?\DateTimeInterface
    {
        return $this->authorize_updated_at;
    }

    public function setAuthorizeUpdatedAt(?\DateTimeInterface $authorize_updated_at): self
    {
        $this->authorize_updated_at = $authorize_updated_at;

        return $this;
    }

    public function getAuthorizeIdStructure(): ?Structure
    {
        return $this->authorize_id_structure;
    }

    public function setAuthorizeIdStructure(?Structure $authorize_id_structure): self
    {
        $this->authorize_id_structure = $authorize_id_structure;

        return $this;
    }
}
