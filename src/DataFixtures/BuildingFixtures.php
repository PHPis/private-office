<?php

namespace App\DataFixtures;

use App\Entity\Building;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BuildingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        for ($i = 0; $i < 30; $i++){
//            $building = new Building();
//            $building->setAddress('Address-' . $i);
//            $building->setXCoord(mt_rand(0, 10000));
//            $building->setYCoord(mt_rand(0, 10000));
//            $manager->persist($building);
//        }

        $manager->flush();
    }
}
