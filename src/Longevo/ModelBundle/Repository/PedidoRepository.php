<?php

namespace Longevo\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PedidoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PedidoRepository extends EntityRepository
{
	private function getQueryBuilder()
	{
	    $em = $this->getEntityManager();
	 
	    $queryBuilder = $em->getRepository('LongevoModelBundle:Pedido')
	    ->createQueryBuilder('p');
	 
	    return $queryBuilder;
	}

	public function findAllInOrder()
	{
	    $qb = $this->getQueryBuilder()
	    ->orderBy('p.createdAt', 'desc');
	 
	    return $qb->getQuery()->getResult();
	}

	public function findByCliente($id_cliente,$id_pedido)
	{
	    $query = $this->getEntityManager()
        ->createQuery(
            'SELECT p, c FROM LongevoModelBundle:Pedido p
            JOIN p.cliente c
            WHERE p.id = :id_pedido AND c.id = :id_cliente'
        )->setParameter('id_pedido', $id_pedido)->setParameter('id_cliente', $id_cliente);

	    try {
	        return $query->getSingleResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}

}
