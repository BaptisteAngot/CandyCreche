<?php

namespace App\Repository;

use App\Entity\PivotChildStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PivotChildStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method PivotChildStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method PivotChildStructure[]    findAll()
 * @method PivotChildStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PivotChildStructureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PivotChildStructure::class);
    }

    // /**
    //  * @return PivotChildStructure[] Returns an array of PivotChildStructure objects
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
    public function findOneBySomeField($value): ?PivotChildStructure
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
