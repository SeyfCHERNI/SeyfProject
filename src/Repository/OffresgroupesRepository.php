<?php

namespace App\Repository;

use App\Entity\Offresgroupes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offresgroupes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offresgroupes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offresgroupes[]    findAll()
 * @method Offresgroupes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffresgroupesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offresgroupes::class);
    }

    // /**
    //  * @return Offresgroupes[] Returns an array of Offresgroupes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offresgroupes
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
