<?php

namespace App\Repository;

use App\Entity\Instruccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Instruccion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instruccion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instruccion[]    findAll()
 * @method Instruccion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstruccionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instruccion::class);
    }

    // /**
    //  * @return Instruccion[] Returns an array of Instruccion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Instruccion
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
