<?php

namespace App\Repository;

use App\Entity\PortfolioAbout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioAbout|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioAbout|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioAbout[]    findAll()
 * @method PortfolioAbout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioAboutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioAbout::class);
    }

    // /**
    //  * @return PortfolioAbout[] Returns an array of PortfolioAbout objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PortfolioAbout
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
