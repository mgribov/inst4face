<?php

namespace i\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PicRepository
 */
class PicRepository extends EntityRepository {
    
    public function getAll($offset = 1, $num = 10) {
        $q = "select p, l.name 
                from iAppBundle:Pic p
                inner join p.login l
                order by p.createdAt desc";

        return $this->getEntityManager()
                ->createQuery($q)
                ->setFirstResult((abs($offset) - 1) * $num)
                ->setMaxResults($num)
                ->useResultCache(true, 600)
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    
}