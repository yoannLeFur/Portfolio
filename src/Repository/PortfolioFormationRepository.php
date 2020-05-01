<?php

namespace App\Repository;

use App\Entity\PortfolioFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioFormation[]    findAll()
 * @method PortfolioFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioFormation::class);
    }

    // /**
    //  * @return PortfolioFormation[] Returns an array of PortfolioFormation objects
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
    public function findOneBySomeField($value): ?PortfolioFormation
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
