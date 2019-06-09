<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Class Status
 * @package App\Entity
 * @ORM\Entity()
 */
class Status
{
    /**
     * STATUS CONSTRAINTS
     */
    const ENABLED  = "ENABLED";
    const DISABLED = "DISABLED";

    const STATUS_DESCRIPTION  = [
        self::ENABLED  => "Is able to use the system",
        self::DISABLED => "Is not able to use the system"
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="string", length=255)
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
        if (!array_key_exists($name, self::STATUS_DESCRIPTION))
        {
            throw new Exception("Invalid Status Name!");
        }
        $this->name = $name;

        $this->setDescription(self::STATUS_DESCRIPTION[$name]);
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