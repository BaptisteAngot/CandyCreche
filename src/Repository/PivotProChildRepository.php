<?php

namespace App\Repository;

use App\Entity\PivotProChild;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PivotProChild|null find($id, $lockMode = null, $lockVersion = null)
 * @method PivotProChild|null findOneBy(array $criteria, array $orderBy = null)
 * @method PivotProChild[]    findAll()
 * @method PivotProChild[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PivotProChildRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PivotProChild::class);
    }

    // /**
    //  * @return PivotProChild[] Returns an array of PivotProChild objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PivotProChild
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
