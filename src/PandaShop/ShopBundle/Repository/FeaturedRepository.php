<?php

namespace PandaShop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FeaturedRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FeaturedRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function getLatestProductOrder(){
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('f.productOrder')
            ->from('ShopBundle:Featured', 'f')
            ->addOrderBy('f.productOrder', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
