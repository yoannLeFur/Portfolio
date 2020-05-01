<?php

namespace App\Repository;

use App\Entity\PortfolioAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioAdmin[]    findAll()
 * @method PortfolioAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioAdmin::class);
    }

    // /**
    //  * @return PortfolioAdmin[] Returns an array of PortfolioAdmin objects
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
    public function findOneBySomeField($value): ?PortfolioAdmin
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
