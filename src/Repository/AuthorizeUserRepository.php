<?php

namespace App\Repository;

use App\Entity\AuthorizeUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AuthorizeUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuthorizeUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuthorizeUser[]    findAll()
 * @method AuthorizeUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorizeUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AuthorizeUser::class);
    }

    // /**
    //  * @return AuthorizeUser[] Returns an array of AuthorizeUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AuthorizeUser
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
