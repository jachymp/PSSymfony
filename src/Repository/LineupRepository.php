<?php

namespace App\Repository;

use App\Entity\Lineup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lineup>
 */
class LineupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lineup::class);
    }

    /**
     * @return Lineup[] Returns an array of Lineup objects
     */
    public function findByLastYear($value): array
    {
         return $this->createQueryBuilder('l')
             ->select('l')
            ->andWhere('l.year = :val')
            ->setParameter('val', $value)
            ->orderBy('l.artist_order', 'DESC')
            ->getQuery()
             ->getResult();
    }

//    public function findOneBySomeField($value): ?Lineup
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
