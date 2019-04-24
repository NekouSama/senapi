<?php

namespace App\Repository;

use App\Entity\Application1Objectif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Application1Objectif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Application1Objectif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Application1Objectif[]    findAll()
 * @method Application1Objectif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Application1ObjectifRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Application1Objectif::class);
    }

    // /**
    //  * @return Application1Objectif[] Returns an array of Application1Objectif objects
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
    public function findOneBySomeField($value): ?Application1Objectif
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
