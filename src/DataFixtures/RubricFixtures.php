<?php

namespace App\DataFixtures;

use App\Entity\Rubric;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RubricFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        for ($i = 0; $i<10; $i++) {
//            $rubric = new Rubric();
//            $rubric->setName('rubric-' . $i);
//            $manager->persist($rubric);
//            $manager->flush();
//            for ($j = 0; $j < 2; $j++) {
//                $rubricChild = new Rubric();
//                $rubricChild->setName('rubric--' . $j);
//                $rubricChild->setParent($rubric);
//                $manager->persist($rubricChild);
//                $manager->flush();
//            }
//        }


//        $manager->flush();
    }
}
