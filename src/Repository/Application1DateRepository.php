<?php

namespace App\Repository;

use App\Entity\Application1Date;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Application1Date|null find($id, $lockMode = null, $lockVersion = null)
 * @method Application1Date|null findOneBy(array $criteria, array $orderBy = null)
 * @method Application1Date[]    findAll()
 * @method Application1Date[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Application1DateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Application1Date::class);
    }

    // /**
    //  * @return Application1Date[] Returns an array of Application1Date objects
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
    public function findOneBySomeField($value): ?Application1Date
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
