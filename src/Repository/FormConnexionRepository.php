<?php

namespace App\Repository;

use App\Entity\FormConnexion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormConnexion>
 *
 * @method FormConnexion|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormConnexion|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormConnexion[]    findAll()
 * @method FormConnexion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormConnexionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormConnexion::class);
    }

//    /**
//     * @return FormConnexion[] Returns an array of FormConnexion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormConnexion
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
