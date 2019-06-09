<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Class Roles
 * @package App\Entity
 * @ORM\Entity()
 */
class Roles
{
    /**
     * ROLES CONSTRAINTS
     */
    const ADMIN = "ADMIN";
    const USER  = "USER";

    const ROLES_DESCRIPTIONS = [
      self::ADMIN => "Administrative Permissions",
      self::USER  => "Regular User Permissions"
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="string")
     * @var string
     */
    private $description;

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
     *
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if (!array_key_exists($name, self::ROLES_DESCRIPTIONS))
        {
            throw new Exception("Invalid Role Name!");
        }
        $this->name = $name;

        $this->setDescription(self::ROLES_DESCRIPTIONS[$name]);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    private function setDescription(string $description): void
    {
        $this->description = $description;
    }

}