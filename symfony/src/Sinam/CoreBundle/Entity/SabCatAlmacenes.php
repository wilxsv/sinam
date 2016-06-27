<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatAlmacenes
 */
class SabCatAlmacenes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var integer
     */
    private $esfarmacia;

    /**
     * @var integer
     */
    private $estasincronizada;

    /**
     * @var integer
     */
    private $estadoalmacen;


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
     * @return SabCatAlmacenes
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
     * Set direccion
     *
     * @param string $direccion
     * @return SabCatAlmacenes
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return SabCatAlmacenes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set esfarmacia
     *
     * @param integer $esfarmacia
     * @return SabCatAlmacenes
     */
    public function setEsfarmacia($esfarmacia)
    {
        $this->esfarmacia = $esfarmacia;

        return $this;
    }

    /**
     * Get esfarmacia
     *
     * @return integer 
     */
    public function getEsfarmacia()
    {
        return $this->esfarmacia;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatAlmacenes
     */
    public function setEstasincronizada($estasincronizada)
    {
        $this->estasincronizada = $estasincronizada;

        return $this;
    }

    /**
     * Get estasincronizada
     *
     * @return integer 
     */
    public function getEstasincronizada()
    {
        return $this->estasincronizada;
    }

    /**
     * Set estadoalmacen
     *
     * @param integer $estadoalmacen
     * @return SabCatAlmacenes
     */
    public function setEstadoalmacen($estadoalmacen)
    {
        $this->estadoalmacen = $estadoalmacen;

        return $this;
    }

    /**
     * Get estadoalmacen
     *
     * @return integer 
     */
    public function getEstadoalmacen()
    {
        return $this->estadoalmacen;
    }
}
