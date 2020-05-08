<?php

namespace App\Repository;

use App\Entity\PortfolioEmail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioEmail|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioEmail|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioEmail[]    findAll()
 * @method PortfolioEmail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioEmailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioEmail::class);
    }

    // /**
    //  * @return PortfolioContact[] Returns an array of PortfolioContact objects
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
    public function findOneBySomeField($value): ?PortfolioContact
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
