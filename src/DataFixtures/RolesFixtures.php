<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Roles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

/**
 * Class RolesFixtures
 * @package App\DataFixtures
 */
class RolesFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        try {
            $manager->persist($this->createRole(Roles::ADMIN));
            $manager->persist($this->createRole(Roles::USER));
        } catch (Exception $exception) {
            print($exception);
        }
        $manager->flush();
    }

    /**
     * @param string $name
     *
     * @return Roles
     * @throws Exception
     */
    private function createRole(string $name): Roles
    {
        $role = new Roles();
        $role->setName($name);
        return $role;
    }
}
