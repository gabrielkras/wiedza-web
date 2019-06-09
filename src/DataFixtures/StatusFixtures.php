<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;

/**
 * Class StatusFixtures
 * @package App\DataFixtures
 */
class StatusFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager):void
    {
        try {
            $manager->persist($this->createStatus(Status::ENABLED));
            $manager->persist($this->createStatus(Status::DISABLED));
        } catch (Exception $exception) {
            print($exception);
        }
        $manager->flush();
    }

    /**
     * @param string $name
     *
     * @return Status
     * @throws Exception
     *
     */
    private function createStatus(string $name): Status
    {
        $status = new Status();
        $status->setName($name);
        return $status;
    }
}
