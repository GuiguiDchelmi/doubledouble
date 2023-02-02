<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Pictures;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Pictures>
 *
 * @method Pictures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pictures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pictures[]    findAll()
 * @method Pictures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pictures::class);
    }

    public function save(Pictures $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Pictures $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Pictures[] Returns an array of Pictures objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pictures
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    public function OnveutfaireunorderBy()
     {
        //return $this->createQuery(
        //    'select p.* from pictures as p group by p.project_id'
        //)
        //->getQuery()
        //->getResult(Query::HYDRATE_ARRAY);
        
        //$query = $this->createQueryBuilder('p')
        //->groupBy('p.project_id')
        //->addGroupBy('p.imageName');
        //
        //return $query->getQuery()->getResult();
        
        //$query = $this->createQueryBuilder('p')
        //->select('p.project_id')
        //->where('p.project_id > 0')
        //->groupBy('p.project_id')
        //->getQuery();
        //
        //return $query->getResult();
     }
}
