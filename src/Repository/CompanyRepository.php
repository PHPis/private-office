<?php

namespace App\Repository;

use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function getCompaniesFromBuilding(int $building): array
    {
        $query = $this->createQueryBuilder('c')
            ->andWhere('c.building = :building')
            ->setParameter('building', $building)
            ->orderBy('c.id', 'ASC');
        return $query
            ->getQuery()
            ->getArrayResult();
    }

    public function getCompaniesWithRubric(int $rubric): array
    {
        $query = $this->createQueryBuilder('c')
            ->andWhere(' :rubric MEMBER OF c.rubric')
            ->setParameter('rubric', $rubric)
            ->orderBy('c.id', 'ASC');
        return $query
            ->getQuery()
            ->getArrayResult();
    }

    public function getCompaniesInRadius(int $xCoord, int $yCoord, int $radius):array
    {
        $query = $this->createQueryBuilder('c')
            ->orderBy('c.id', 'ASC');
        $query
            ->innerJoin('App\Entity\Building', 'b')
            ->andWhere('c.building = b.id')
            ->andWhere($query->expr()
                ->lte($query->expr()->sqrt(
                    $query->expr()->sum(
                        $query->expr()->prod(
                            $query->expr()->diff('b.xCoord', ':xCoord'), $query->expr()->diff('b.xCoord', ':xCoord')
                        ),
                        $query->expr()->prod(
                            $query->expr()->diff('b.yCoord', ':yCoord'), $query->expr()->diff('b.yCoord', ':yCoord')
                        )
                    )),
                    ':radius'))
            ->setParameter('xCoord', $xCoord)
            ->setParameter('yCoord', $yCoord)
            ->setParameter('radius', $radius);
        return $query
            ->getQuery()
            ->getArrayResult();
    }
}
