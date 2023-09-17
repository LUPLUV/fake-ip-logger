<?php

namespace App\Repository;

use App\Entity\IpLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IpLog>
 *
 * @method IpLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpLog[]    findAll()
 * @method IpLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpLog::class);
    }

//    /**
//     * @return IpLog[] Returns an array of IpLog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IpLog
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
