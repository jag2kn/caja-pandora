<?php

namespace Ateos\AnalisisBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
* Usuario
*/
class Usuario implements UserInterface
{
    /**
* @var string
*/
    private $usuario;

    /**
* @var string
*/
    private $clave;

    /**
* @var string
*/
    private $nombres;

    /**
* @var string
*/
    private $apellidos;

    /**
* @var \DateTime
*/
    private $fecha;

    /**
* @var string
*/
    private $correo;

    /**
* @var integer
*/
    private $id;
    
    /**
* @var string
*/
    private $salt;

    


    /**
* Set usuario
*
* @param string $usuario
* @return Usuario
*/
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
* Get usuario
*
* @return string
*/
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
* Set clave
*
* @param string $clave
* @return Usuario
*/
    public function setClave($clave)
    {
        $this->clave = $clave;
    
        return $this;
    }

    /**
* Get clave
*
* @return string
*/
    public function getClave()
    {
        return $this->clave;
    }

    /**
* Set nombres
*
* @param string $nombres
* @return Usuario
*/
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
* Get nombres
*
* @return string
*/
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
* Set apellidos
*
* @param string $apellidos
* @return Usuario
*/
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
* Get apellidos
*
* @return string
*/
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
* Set fecha
*
* @param \DateTime $fecha
* @return Usuario
*/
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
* Get fecha
*
* @return \DateTime
*/
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
* Set correo
*
* @param string $correo
* @return Usuario
*/
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
* Get correo
*
* @return string
*/
    public function getCorreo()
    {
        return $this->correo;
    }

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
* Set salt
*
* @param string $salt
* @return Usuario
*/
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
* Get salt
*
* @return string
*/
    public function getSalt()
    {
        return $this->salt;
    }



//////////////////////////////////////

    public function getPassword()
    {
        return $this->clave;
    }

    public function getUsername()
    {
        return $this->usuario;
    }
        public function getRoles()
        {
                return array("ROLE_USUARIO");
        }
        public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {

        if (!$user instanceof Usuario) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->getSalt() !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

}
