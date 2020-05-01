<?php

namespace App\Repository;

use App\Entity\PortfolioContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioContact[]    findAll()
 * @method PortfolioContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioContact::class);
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
