<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Exception;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity()
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @var
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="Status", mappedBy="id")
     * @var Status
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="Roles", mappedBy="id")
     * @var Roles
     */
    private $role;

    /**
     * @ORM\Column(name="created", type="datetime")
     * @var DateTime
     */
    private $created;

    /**
     * @ORM\Column(name="updated", type="datetime")
     * @var DateTime
     */
    private $updated;

    /**
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     * @var DateTime
     */
    private $lastLogin;

    /**
     * User constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->created = new DateTime("now");
    }

    /**
     * Gets triggered every time on update
     *
     * @ORM\PreUpdate()
     * @throws Exception
     */
    public function onPreUpdate(): void
    {
        $this->setUpdated(new DateTime('now'));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Roles
     */
    public function getRole(): Roles
    {
        return $this->role;
    }

    /**
     * @param Roles $role
     */
    public function setRole(Roles $role): void
    {
        $this->role = $role;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @return DateTime
     */
    public function getLastLogin(): DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param DateTime $lastLogin
     */
    public function setLastLogin(DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }
}