<?php

namespace Ateos\AnalisisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Verso
*
* @ORM\Table(name="verse")
* @ORM\Entity
*/
class Verso
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
	* @ORM\ManyToOne(targetEntity="Libro")
	* @ORM\JoinColumn(name="book_id", referencedColumnName="id")
	*/
	protected $libro;
    
    /**
	* @var integer
	*
	* @ORM\Column(name="chapter", type="integer")
	*/
    private $capitulo;

    /**
	* @var integer
	*
	* @ORM\Column(name="verse", type="integer")
	*/
    private $verso;

    /**
	* @var string
	*
	* @ORM\Column(name="text", type="text")
	*/
    private $texto;

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
     * Set capitulo
     *
     * @param integer $capitulo
     * @return Verso
     */
    public function setCapitulo($capitulo)
    {
        $this->capitulo = $capitulo;

        return $this;
    }

    /**
     * Get capitulo
     *
     * @return integer 
     */
    public function getCapitulo()
    {
        return $this->capitulo;
    }

    /**
     * Set verso
     *
     * @param integer $verso
     * @return Verso
     */
    public function setVerso($verso)
    {
        $this->verso = $verso;

        return $this;
    }

    /**
     * Get verso
     *
     * @return integer 
     */
    public function getVerso()
    {
        return $this->verso;
    }

    /**
     * Set texto
     *
     * @param string $texto
     * @return Verso
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set libro
     *
     * @param \Ateos\AnalisisBundle\Entity\Libro $libro
     * @return Verso
     */
    public function setLibro(\Ateos\AnalisisBundle\Entity\Libro $libro = null)
    {
        $this->libro = $libro;

        return $this;
    }

    /**
     * Get libro
     *
     * @return \Ateos\AnalisisBundle\Entity\Libro 
     */
    public function getLibro()
    {
        return $this->libro;
    }
}
