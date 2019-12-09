<?php

namespace App\DataFixtures;

use App\Entity\Rubric;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RubricFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<10; $i++) {
            $rubric = new Rubric();
            $rubric->setName('rubric-' . $i);
            $manager->persist($rubric);
        }
        for ($i = 0; $i < 10; $i++) {
            $rubric = new Rubric();
            $rubric->setName('rubric--' . $i);
            $parent = $manager->getRepository(Rubric::class)->find(rand(1, 10));
            if ($parent == null){
                continue;
            }
            $rubric->setParent($parent);
            $manager->persist($rubric);
        }

        $manager->flush();
    }
}
