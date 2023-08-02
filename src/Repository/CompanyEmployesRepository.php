<?php

namespace App\Repository;

use App\Entity\CompanyEmployes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompanyEmployes>
 *
 * @method CompanyEmployes|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyEmployes|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyEmployes[]    findAll()
 * @method CompanyEmployes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyEmployesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyEmployes::class);
    }

//    /**
//     * @return CompanyEmployes[] Returns an array of CompanyEmployes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompanyEmployes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
