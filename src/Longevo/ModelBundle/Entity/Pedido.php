<?php

namespace Longevo\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; 
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido")
 * @ORM\Entity(repositoryClass="Longevo\ModelBundle\Repository\PedidoRepository")
 */
class Pedido extends Timestampable
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
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /** 
     * @var Cliente 
     * 
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="pedido", cascade={"persist", "remove" }) 
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente", nullable=false) 
     * @Assert\NotBlank 
     */ 
    private $cliente;

    /** 
     * Constructor 
     */ 
    public function __construct() 
    { 
        parent::__construct();
    
        $this->cliente = new ArrayCollection(); 
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Pedido
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * @return Pedido
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
     * @return Pedido
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
     * Set cliente
     *
     * @param \Longevo\ModelBundle\Entity\Cliente $cliente
     *
     * @return Pedido
     */
    public function setCliente(\Longevo\ModelBundle\Entity\Cliente $cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Longevo\ModelBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }
}
