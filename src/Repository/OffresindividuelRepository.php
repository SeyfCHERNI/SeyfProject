<?php

namespace App\Repository;

use App\Entity\Offresindividuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offresindividuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offresindividuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offresindividuel[]    findAll()
 * @method Offresindividuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffresindividuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offresindividuel::class);
    }

    // /**
    //  * @return Offresindividuel[] Returns an array of Offresindividuel objects
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
    public function findOneBySomeField($value): ?Offresindividuel
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
