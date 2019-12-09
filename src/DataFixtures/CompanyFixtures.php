<?php

namespace App\DataFixtures;

use App\Entity\Building;
use App\Entity\Company;
use App\Entity\Rubric;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        for ($i = 0; $i < 10; $i++) {
//            $company = new Company();
//            $company->setName('company-' . $i);
//            $company->setPhone([rand(1000, 10000), rand(1000, 10000)]);
//            $company->addBuilding($manager->getRepository(Building::class)->find(rand(0,10)));
//            $company->addRubric($manager->getRepository(Rubric::class)->find(rand(0, 20)));
//        }

        $manager->flush();
    }
}
