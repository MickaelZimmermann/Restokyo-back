<?php

namespace App\Repository;

use App\Entity\Establishment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Establishment>
 *
 * @method Establishment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Establishment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Establishment[]    findAll()
 * @method Establishment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstablishmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Establishment::class);
    }

    public function add(Establishment $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Establishment $entity, bool $flush = true): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
    * @return Establishment[] Returns an array of Establishment objects
    */
   public function findByType($type): array
   {
       return $this->createQueryBuilder('e')
           ->where('e.type = :type')
           ->setParameter('type', $type)
           ->orderBy('e.id', 'ASC')
           ->getQuery()
           ->getResult()
       ;
   }

   /**
    * @return Establishment[] Returns an array of Establishment objects
    */
    public function findByStatus($status): array
    {
        
        return $this->createQueryBuilder('e')
            ->where('e.status = :status')
            ->setParameter('status', $status)
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
   /**
    * @return Establishment[] Returns an array of Establishment objects
    */
    public function findByStatus0(): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.status = 0')
            ->orderBy('e.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * Find all ordered by status ASC
    */
   public function findAllOrderedByStatusAsc()
   {    
        return $this->createQueryBuilder('e')
        ->orderBy('e.status', 'ASC')
        ->getQuery()
        ->getResult();
   }
    
    /**
    * Find all ordered by type ASC
    */
   public function findAllOrderedByTypeAsc()
   {    
        return $this->createQueryBuilder('e')
        ->orderBy('e.type', 'ASC')
        ->getQuery()
        ->getResult();
   }
   
    /**
    * @return Establishment[] Returns an array of Establishment objects
    */
   public function findByDistrict($district): array
   {
       return $this->createQueryBuilder('e')
           ->andWhere('e.district = :district')
           ->setParameter('district', $district)
           ->orderBy('e.id', 'ASC')
           ->getQuery()
           ->getResult()
       ;
   }

   /**
    * Find all ordered by district ASC
    */
    public function findAllOrderedByDistrictAsc()
    {    
         return $this->createQueryBuilder('e')
         ->orderBy('e.district', 'ASC')
         ->getQuery()
         ->getResult();
    }

    /**
     * Find best rating limit 3
     */
    public function findBestRatingDesc()
    {
        return $this->createQueryBuilder('e')
        ->andWhere('e.status = 1')
        ->orderBy('e.rating', 'DESC')
        ->setMaxResults(3)
        ->getQuery()
        ->getResult();
        
    }

    public function averageRating($id)
    {
        $entityManager = $this->getEntityManager();

        // DQL Doctrine Query Language
        $query = $entityManager->createQuery(
            'SELECT avg(c.rating) as rating
            FROM App\Entity\Comment c
            WHERE c.establishment = :id'
        )->setParameter('id', $id);

        return $query->getResult();
    }
   

    // SELECT establishment.ID, establishment.name, establishment.status, establishment.type, establishment.description, establishment.address, establishment.price, establishment.rating, establishment.picture,tag.name
    // FROM establishment
    // LEFT OUTER JOIN tag_establishment
    //   ON establishment.ID = tag_establishment.establishment_id
    // LEFT OUTER JOIN tag
    //   ON tag_establishment.tag_id = tag.ID
    // WHERE establishment.status = 1


//    /**
//     * @return Establishment[] Returns an array of Establishment objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Establishment
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
