<?php

namespace App\Repository;

use App\Entity\Departamento;
use App\Entity\Localidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Localidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Localidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Localidad[]    findAll()
 * @method Localidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalidadRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 3;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Localidad::class);
    }

    public function getLocalidadPaginator(Departamento $departamento, int $offset): Paginator
    {
        $query = $this -> createQueryBuilder('l')
            -> andWhere('l.dpto = :departamento')
            -> setParameter('departamento', $departamento)
            -> orderBy('l.nombre', 'ASC')
            -> setMaxResults(self::PAGINATOR_PER_PAGE)
            -> setFirstResult($offset)
            -> getQuery()
        ;
        return new Paginator($query);
    }

    // /**
    //  * @return Localidad[] Returns an array of Localidad objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Localidad
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
