<?php

namespace Longevo\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ClienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClienteRepository extends \Doctrine\ORM\EntityRepository
{
	private function getQueryBuilder()
	{
	    $em = $this->getEntityManager();
	 
	    $queryBuilder = $em->getRepository('LongevoModelBundle:Cliente')
	    ->createQueryBuilder('c');
	 
	    return $queryBuilder;
	}

	public function findAllInOrder()
	{
	    $qb = $this->getQueryBuilder()
	    ->orderBy('c.createdAt', 'desc');
	 
	    return $qb->getQuery()->getResult();
	}

	public function findByEmail($email)
	{
	    $qb = $this->getQueryBuilder()
	    ->where("c.email = '".$email."'");
	 
	    return $qb->getQuery()->getResult();
	}
}
