<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Pictures;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use ProxyManager\ProxyGenerator\LazyLoadingGhost\MethodGenerator\SetProxyInitializer;

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
        //$qb = $this->createQueryBuilder('p');
        //$qb->select('p')
           // ->innerJoin('p.picture', 'p', Join::ON, $qb->expr()->andx(
             //   $qb->expr()->eq('', ''),
               // $qb->expr()->eq('', '')
            //))
            //->where('');

            // SELECT pictures.image_name FROM project INNER JOIN pictures ON project.id = pictures.project_id 
            $query=$this->createQueryBuilder('p')
            ->select('p.image_name')
            ->addSelect('p.project_id')
            ->where('p.project_id > :id')
            ->setParameter('id' , 0)
            ->groupBy('p.project_id')

        //return $this->createQuery(
        //    'select p.* from pictures as p group by p.project_id'
        //)
        //->getQuery()
        //->getResult(Query::HYDRATE_ARRAY);
        
        //$query = $this->createQueryBuilder('p')
        //->groupBy('p.project_id');
        //
        //
        return $query->getQuery()->getResult();

        //$sql = 'SELECT project_id, ANY_VALUE(picture_name) FROM pictures GROUP BY project_id';
        //$manager->getConnection()->query($sql);

        //$query = $this->createQueryBuilder('p')
        //->select('p.project_id , ANY_VALUE(p.name)')
        //->where('p.project_id > 0')
        //->groupBy('p.project_id')
        //->getQuery();
        //
        //return $query->getResult();
     }
}
