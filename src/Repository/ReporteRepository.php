<?php

namespace App\Repository;

use App\Entity\Centro;
use App\Entity\Reporte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reporte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reporte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reporte[]    findAll()
 * @method Reporte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReporteRepository extends ServiceEntityRepository
{
    /*Cantidad de FILAS A MOSTRAR en pantalla*/
    public const PAGINATOR_PER_PAGE = 3;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reporte::class);
    }

    public function getReportePaginator(Centro $centro, int $offset): Paginator
    {
        $query = $this -> createQueryBuilder('r')
            -> andWhere('r.centro = :centro')
            -> setParameter('centro', $centro)
            -> orderBy('r.gestion', 'DESC')
            -> setMaxResults(self::PAGINATOR_PER_PAGE)
            -> setFirstResult($offset)
            -> getQuery()
        ;
        return new Paginator($query);
    }

    // /**
    //  * @return Reporte[] Returns an array of Reporte objects
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
    public function findOneBySomeField($value): ?Reporte
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
