<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ComentarioRepository extends EntityRepository
{
    public function findByPost($post)
    {
        return $this->getEntityManager()
                ->createQueryBuilder('c')->select('c')->from('AppBundle:Comentario','c')
                ->where('c.post = :post')
                ->setParameter('post',$post)
                ->getQuery()
            ->getResult();
    }
}
