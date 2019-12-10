<?php

namespace App\Repository;

use App\Entity\Building;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class BuildingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Building::class);
    }

    public function getAllBuildingArray(): array
    {
        $query = $this->createQueryBuilder('b')
            ->orderBy('b.id', 'ASC');
        return $query
            ->getQuery()
            ->getArrayResult();
    }
}
