<?php

namespace App\Repository;

use App\Entity\ConciSacuerdo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConciSacuerdo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConciSacuerdo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConciSacuerdo[]    findAll()
 * @method ConciSacuerdo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConciSacuerdoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConciSacuerdo::class);
    }

    // /**
    //  * @return ConciSacuerdo[] Returns an array of ConciSacuerdo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConciSacuerdo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
