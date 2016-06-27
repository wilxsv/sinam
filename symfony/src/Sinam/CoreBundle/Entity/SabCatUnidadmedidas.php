<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatUnidadmedidas
 */
class SabCatUnidadmedidas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $descripcionlarga;

    /**
     * @var integer
     */
    private $unidadescontenidas;

    /**
     * @var integer
     */
    private $cantidaddecimal;

    /**
     * @var integer
     */
    private $estasincronizada;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return SabCatUnidadmedidas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set descripcionlarga
     *
     * @param string $descripcionlarga
     * @return SabCatUnidadmedidas
     */
    public function setDescripcionlarga($descripcionlarga)
    {
        $this->descripcionlarga = $descripcionlarga;

        return $this;
    }

    /**
     * Get descripcionlarga
     *
     * @return string 
     */
    public function getDescripcionlarga()
    {
        return $this->descripcionlarga;
    }

    /**
     * Set unidadescontenidas
     *
     * @param integer $unidadescontenidas
     * @return SabCatUnidadmedidas
     */
    public function setUnidadescontenidas($unidadescontenidas)
    {
        $this->unidadescontenidas = $unidadescontenidas;

        return $this;
    }

    /**
     * Get unidadescontenidas
     *
     * @return integer 
     */
    public function getUnidadescontenidas()
    {
        return $this->unidadescontenidas;
    }

    /**
     * Set cantidaddecimal
     *
     * @param integer $cantidaddecimal
     * @return SabCatUnidadmedidas
     */
    public function setCantidaddecimal($cantidaddecimal)
    {
        $this->cantidaddecimal = $cantidaddecimal;

        return $this;
    }

    /**
     * Get cantidaddecimal
     *
     * @return integer 
     */
    public function getCantidaddecimal()
    {
        return $this->cantidaddecimal;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatUnidadmedidas
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
}
