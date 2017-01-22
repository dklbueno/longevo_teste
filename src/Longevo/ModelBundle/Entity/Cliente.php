<?php

namespace Longevo\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="Longevo\ModelBundle\Repository\ClienteRepository")
 */
class Cliente extends Timestampable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cliente", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank
     */
    private $email;

    /** 
     * @var ArrayCollection 
     * 
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="cliente", cascade={"remove"}) 
     */ 
    private $pedido;

    /** 
     * Constructor 
     */ 
    public function __construct() 
    { 
         parent::__construct();
    
        $this->pedido = new ArrayCollection(); 
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Cliente
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
     * Set name
     *
     * @param string $name
     *
     * @return Cliente
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Add pedido
     *
     * @param \Longevo\ModelBundle\Entity\Pedido $pedido
     *
     * @return Cliente
     */
    public function addPedido(\Longevo\ModelBundle\Entity\Pedido $pedido)
    {
        $this->pedido[] = $pedido;

        return $this;
    }

    /**
     * Remove pedido
     *
     * @param \Longevo\ModelBundle\Entity\Pedido $pedido
     */
    public function removePedido(\Longevo\ModelBundle\Entity\Pedido $pedido)
    {
        $this->pedido->removeElement($pedido);
    }

    /**
     * Get pedido
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /** 
     * @return string 
     */ 
    public function __toString() 
    { 
        return $this->getName(); 
    }

}
