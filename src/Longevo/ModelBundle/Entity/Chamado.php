<?php

namespace Longevo\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chamado
 *
 * @ORM\Table(name="chamado")
 * @ORM\Entity(repositoryClass="Longevo\ModelBundle\Repository\ChamadoRepository")
 */
class Chamado extends Timestampable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pedido", type="integer")
     */
    private $id_pedido;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Chamado
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Chamado
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set id
     *
     * @param id $id_pedido
     *
     * @return Chamado
     */
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;

        return $this;
    }

    /**
     * Get id_pedido
     *
     * @return int
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

}

