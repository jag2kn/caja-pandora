<?php

namespace Ateos\AnalisisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Comentario
*
* @ORM\Table(name="comentario")
* @ORM\Entity
*/
class Comentario
{
    /**
	* @var integer
	*
	* @ORM\Column(name="id", type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="IDENTITY")
	*/
    private $id;
    
	/**
	* @ORM\ManyToOne(targetEntity="Verso")
	* @ORM\JoinColumn(name="verso_id_desde", referencedColumnName="id")
	*/
	protected $versoDesde;

	/**
	* @ORM\ManyToOne(targetEntity="Verso")
	* @ORM\JoinColumn(name="verso_id_hasta", referencedColumnName="id", nullable=true)
	*/
	protected $versoHasta;
	
	/**
	* @var string
	*
	* @ORM\Column(name="comentario", type="text")
	*/
    private $comentario;
    
    
	/**
	* @var string
	*
	* @ORM\Column(name="autor", type="string", length=256)
	*/
    private $autor;
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set autor
     *
     * @param string $autor
     * @return Comentario
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set versoDesde
     *
     * @param \Ateos\AnalisisBundle\Entity\Verso $versoDesde
     * @return Comentario
     */
    public function setVersoDesde(\Ateos\AnalisisBundle\Entity\Verso $versoDesde = null)
    {
        $this->versoDesde = $versoDesde;

        return $this;
    }

    /**
     * Get versoDesde
     *
     * @return \Ateos\AnalisisBundle\Entity\Verso 
     */
    public function getVersoDesde()
    {
        return $this->versoDesde;
    }

    /**
     * Set versoHasta
     *
     * @param \Ateos\AnalisisBundle\Entity\Verso $versoHasta
     * @return Comentario
     */
    public function setVersoHasta(\Ateos\AnalisisBundle\Entity\Verso $versoHasta = null)
    {
        $this->versoHasta = $versoHasta;

        return $this;
    }

    /**
     * Get versoHasta
     *
     * @return \Ateos\AnalisisBundle\Entity\Verso 
     */
    public function getVersoHasta()
    {
        return $this->versoHasta;
    }
}
