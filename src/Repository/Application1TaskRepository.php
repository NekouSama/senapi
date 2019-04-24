<?php

namespace App\Repository;

use App\Entity\Application1Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Application1Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Application1Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Application1Task[]    findAll()
 * @method Application1Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Application1TaskRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Application1Task::class);
    }

    // /**
    //  * @return Application1Task[] Returns an array of Application1Task objects
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
    public function findOneBySomeField($value): ?Application1Task
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
