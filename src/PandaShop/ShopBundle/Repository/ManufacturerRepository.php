<?php

namespace PandaShop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ManufacturerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ManufacturerRepository extends EntityRepository
{
    /**
     * @param bool $showEmpty
     * @param string $order
     * @param string $sort
     * @return array
     */
    public function getAllManufacturers($showEmpty = true, $sort = 'name', $order = 'ASC')
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('c')
            ->from('ShopBundle:Manufacturer', 'c');

        if (!$showEmpty) {
            $qb->innerJoin('c.products', 'p')
                ->andWhere('p.quantity <> 0');
        }

        $qb->orderBy('c.' . $sort, $order);

        return $qb->getQuery()->getResult();
    }

    /**
     * query for admin paginator
     *
     * @return QueryBuilder
     */
    public function getAllManufacturersAdminQB()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from('ShopBundle:Manufacturer', 'm');

        return $qb;
    }

    public function findBySlug($slug)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('m')
            ->from('ShopBundle:Manufacturer', 'm')
            ->where('m.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getFirstManufacturer()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('ma')
            ->from('ShopBundle:Manufacturer', 'ma')
            ->orderBy('ma.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}