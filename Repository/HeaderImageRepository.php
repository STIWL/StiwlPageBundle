<?php

/**
 * @author Luis Sanchez <luis.sanchez.saldana@gmail.com>
 */

namespace Stiwl\PageBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * HeaderImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HeaderImageRepository extends EntityRepository {

    public function findAllOrdered_language($language) {
        $qb = $this->createQueryBuilder('headerImage');
        $qb->addSelect('languages')
                ->join('headerImage.languages', 'languages')
                ->where('languages.language = :language')
                ->setParameter('language', $language)
                ->orderBy('headerImage.position', 'asc');
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findAllToSonataAdmin_query_language($query, $language) {
//        $qb = $this->createQueryBuilder('headerImage');
        $query->addSelect('languages')
                ->join('o.languages', 'languages')
                ->where('languages.language = :language')
                ->setParameter('language', $language)
        ;
        return $query;
    }

    public function findOne_id_language($id, $language) {
        $qb = $this->createQueryBuilder('headerImage');
        $qb->addSelect('languages')
                ->join('headerImage.languages', 'languages')
                ->where('languages.language = :language')
                ->andWhere('headerImage.id = :id')
                ->setParameter('language', $language)
                ->setParameter('id', $id)
        ;
        $query = $qb->getQuery();
        return $query->getOneOrNullResult();
    }

}
