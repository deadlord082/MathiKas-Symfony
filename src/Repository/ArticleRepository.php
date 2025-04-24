<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedarticleException;
use Symfony\Component\Security\Core\article\PasswordAuthenticatedarticleInterface;
use Symfony\Component\Security\Core\article\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<article>
 */
class ArticleRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, article::class);
    }


       /**
        * @return article[] Returns an array of article objects
        */
       public function getArticles(): array
       {
           return $this->findAll()
           ;
       }

    //    public function findOneBySomeField($value): ?article
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
