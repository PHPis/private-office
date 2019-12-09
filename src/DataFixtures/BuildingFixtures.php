<?php

namespace App\DataFixtures;

use App\Entity\Building;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BuildingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++){
            $building = new Building();
            $building->setAddress('Address-' . $i);
            $building->setCoords([rand(0, 100), rand(0, 100)]);
        }

        $manager->flush();
    }
}
