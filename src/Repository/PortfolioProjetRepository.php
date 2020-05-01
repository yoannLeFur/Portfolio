<?php

namespace App\Repository;

use App\Entity\PortfolioProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioProjet[]    findAll()
 * @method PortfolioProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioProjet::class);
    }

    // /**
    //  * @return PortfolioProjet[] Returns an array of PortfolioProjet objects
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
    public function findOneBySomeField($value): ?PortfolioProjet
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
