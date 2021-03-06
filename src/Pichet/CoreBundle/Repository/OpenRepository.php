<?php

namespace Pichet\CoreBundle\Repository;

/**
 * OpenRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OpenRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllMailOpen(){
        $query = $this->createQueryBuilder('o')
            ->select('COUNT(o)')
        ;
        return $query
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }
}
