<?php

namespace App\Repository;

use App\Entity\PortfolioExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PortfolioExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method PortfolioExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method PortfolioExperience[]    findAll()
 * @method PortfolioExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PortfolioExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PortfolioExperience::class);
    }

    // /**
    //  * @return PortfolioExperience[] Returns an array of PortfolioExperience objects
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
    public function findOneBySomeField($value): ?PortfolioExperience
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
