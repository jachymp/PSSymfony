<?php

namespace App\Repository;

use App\Entity\Year;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Year>
 */
class YearRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Year::class);
    }

        /**
         * @return Year[] Returns an array of Year objects
         */
        public function findLastYearData(): array
        {
            return $this->createQueryBuilder('y')
                ->orderBy('y.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getResult()
            ;
        }

        public function getLastYear() {
            return $this->createQueryBuilder('m')->select('MAX(m.id) as lastYearId')->getQuery()->getSingleResult();
        }

    //    public function findOneBySomeField($value): ?Year
    //    {
    //        return $this->createQueryBuilder('y')
    //            ->andWhere('y.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
