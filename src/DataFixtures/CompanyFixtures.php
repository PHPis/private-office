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
        for ($i = 0; $i < 30; $i++) {
            $company = new Company();
            $company->setName('company-' . $i);
            $company->setPhone([rand(1000, 10000), rand(1000, 10000)]);
            $company->setBuilding($manager->getRepository(Building::class)->find(rand(1,30)));
            if (($i % 2) > 0) {
                $company->addRubric($manager->getRepository(Rubric::class)->find(rand(1, 15)));
                $company->addRubric($manager->getRepository(Rubric::class)->find(rand(15, 30)));
            } else {
                $company->addRubric($manager->getRepository(Rubric::class)->find(rand(1, 30)));
            }
            $manager->persist($company);
        }

        $manager->flush();
    }
}
