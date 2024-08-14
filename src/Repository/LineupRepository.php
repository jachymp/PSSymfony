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
             ->andWhere('l.support is null')
             ->setParameter('val', $value)
             ->orderBy('l.artist_order', 'DESC')
             ->getQuery()
             ->getResult();
    }

    public function findLineupByDay($yearName, $dayName, $placeName): array
    {
        return $this->createQueryBuilder('l')
            ->select('l.time_from', 'l.time_to', 'l.name')
            ->join('l.place', 'p')
            ->andWhere('l.year = :yearName')
            ->setParameter('yearName', $yearName)
            ->andWhere('l.day = :dayName')
            ->setParameter('dayName', $dayName)
            ->andWhere('p.name = :placeName')
            ->setParameter('placeName', $placeName)
            ->andWhere('l.support is null')
            ->andWhere('l.night_order is null')
            ->orderBy('l.time_from', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findLineupByDayNight($yearName, $dayName, $placeName): array
    {
        return $this->createQueryBuilder('l')
            ->select('l.time_from', 'l.time_to', 'l.name')
            ->join('l.place', 'p')
            ->andWhere('l.year = :yearName')
            ->setParameter('yearName', $yearName)
            ->andWhere('l.day = :dayName')
            ->setParameter('dayName', $dayName)
            ->andWhere('p.name = :placeName')
            ->setParameter('placeName', $placeName)
            ->andWhere('l.support is null')
            ->andWhere('l.night_order is not null')
            ->orderBy('l.time_from', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findSupportByDay($yearName, $dayName): array
    {
        return $this->createQueryBuilder('l')
            ->select('l.time_from', 'l.time_to', 'l.name')
            ->andWhere('l.year = :yearName')
            ->setParameter('yearName', $yearName)
            ->andWhere('l.day = :dayName')
            ->setParameter('dayName', $dayName)
            ->andWhere('l.support is not null')
            ->orderBy('l.time_from', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
