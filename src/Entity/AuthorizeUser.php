<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorizeUserRepository")
 * @UniqueEntity(fields={"Authorize_login"}, message="There is already an account with this Authorize_login")
 */
class AuthorizeUser implements UserInterface
{
    /**
     * @ORM\Column(type="json")
     */
    private $roles;

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
    public function __construct()
    {
        $this->Authorize_created_at = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->roles = array('ROLE_AUTHO');
    }
    public function getUsername()
    {
        return $this->Authorize_login;
    }

    public function getPassword()
    {
        return $this->Authorize_password;
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }
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
    public function getRoles()
    {
        return $this->roles;
    }
    public function eraseCredentials()
    {
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
