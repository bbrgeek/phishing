<?php

namespace Pichet\CoreBundle\Repository;

/**
 * PersonnelleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonnelleRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllInfoPersonnelle(){
        $query = $this->createQueryBuilder('p')
            ->select('COUNT(p)')
        ;
        return $query
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }
}
