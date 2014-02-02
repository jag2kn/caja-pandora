<?php

namespace Ateos\AnalisisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Version
*
* @ORM\Table(name="version")
* @ORM\Entity
*/
class Version
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
	* @var string
	*
	* @ORM\Column(name="nombre", type="string", length=128)
	*/
    private $nombre;
    
    /**
	* @var string
	*
	* @ORM\Column(name="url", type="string", length=256)
	*/
    private $string;
    

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
     * Set nombre
     *
     * @param string $nombre
     * @return Version
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

    /**
     * Set string
     *
     * @param string $string
     * @return Version
     */
    public function setString($string)
    {
        $this->string = $string;

        return $this;
    }

    /**
     * Get string
     *
     * @return string 
     */
    public function getString()
    {
        return $this->string;
    }
}
