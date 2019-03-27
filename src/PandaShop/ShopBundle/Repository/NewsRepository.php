<?php

namespace PandaShop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends EntityRepository
{
    /**
     * @param $slug string
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('n')
            ->from('ShopBundle:News', 'n')
            ->where('n.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * query for admin paginator
     *
     * @return QueryBuilder
     */
    public function getAllNewsAdminQB()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('n')
            ->from('ShopBundle:News', 'n');

        return $qb;
    }

    /**
     * @return mixed
     */
    public function getLastNews()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('n')
            ->from('ShopBundle:News', 'n')
            ->orderBy('n.date', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Create query for paginator
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getNewsQB()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('a')
            ->from('ShopBundle:News', 'a')
            ->orderBy('a.date', 'DESC');
    }
}
