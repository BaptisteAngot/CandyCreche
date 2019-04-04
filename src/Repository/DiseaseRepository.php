<?php

namespace App\Repository;

use App\Entity\Child;
use App\Entity\Disease;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Disease|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disease|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disease[]    findAll()
 * @method Disease[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiseaseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Disease::class);
    }


    public function getDisease($id)
    {
        $em = $this->getEntityManager();
        $repository = $em->getRepository(Child::class);
        $query = $repository->createQueryBuilder('u')
            ->innerJoin('u.disease_id_child','g')
            ->where('g.id = :child_id')
            ->setParameter('child_id', $id)
            ->getQuery()->getResult();

//        $qb = $this->getEntityManager()->createQueryBuilder();
//        $qb->select('disease_id','toto')
//            ->from('disease_child','toto')
//            ->where('child_id =?1')
//            ->setParameter(1,$id);
//        return $qb->getQuery()->getArrayResult();
    }
}
