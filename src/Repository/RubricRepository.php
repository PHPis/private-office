<?php

namespace App\Repository;

use App\Entity\Rubric;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @method Rubric|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rubric|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rubric[]    findAll()
 * @method Rubric[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RubricRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rubric::class);
    }

    public function getAllBasicInArray()
    {
        $query = $this->createQueryBuilder('r')
            ->orderBy('r.id', 'ASC');
        $query->andWhere($query->expr()->isNull('r.parent'));
        return $query
            ->getQuery()
            ->getArrayResult();
    }

    public function getAllChildrenInArray(int $id)
    {
        $query = $this->createQueryBuilder('r')
            ->select('r.id, r.name')
            ->orderBy('r.id', 'ASC');
        $query->andWhere('r.parent = :parent')
            ->setParameter('parent', $id);
        return $query
            ->getQuery()
            ->getArrayResult();
    }
    // /**
    //  * @return Rubric[] Returns an array of Rubric objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rubric
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
