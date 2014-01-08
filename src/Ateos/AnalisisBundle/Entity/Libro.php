<?php

namespace Ateos\AnalisisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Libro
*
* @ORM\Table(name="book")
* @ORM\Entity
*/
class Libro
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
	* @var integer
	*
	* @ORM\Column(name="testament_reference_id", type="integer")
	*/
    private $testamento;
    
    /**
	* @var string
	*
	* @ORM\Column(name="name", type="string", length=50, nullable=false)
	*/
    private $nombre;


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
     * Set testamento
     *
     * @param integer $testamento
     * @return Libro
     */
    public function setTestamento($testamento)
    {
        $this->testamento = $testamento;

        return $this;
    }

    /**
     * Get testamento
     *
     * @return integer 
     */
    public function getTestamento()
    {
        return $this->testamento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Libro
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
