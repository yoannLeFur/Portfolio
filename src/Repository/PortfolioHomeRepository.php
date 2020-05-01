<?php

namespace App\Repository;

use App\Entity\PortfolioHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioHome[]    findAll()
 * @method PortfolioHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioHome::class);
    }

    // /**
    //  * @return PortfolioHome[] Returns an array of PortfolioHome objects
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
    public function findOneBySomeField($value): ?PortfolioHome
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
