<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmUnidadmedidas
 */
class FarmUnidadmedidas
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
     * @var string
     */
    private $auusuariocreacion;

    /**
     * @var \DateTime
     */
    private $aufechacreacion;

    /**
     * @var string
     */
    private $auusuariomodificacion;

    /**
     * @var \DateTime
     */
    private $aufechamodificacion;

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
     * @return FarmUnidadmedidas
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
     * @return FarmUnidadmedidas
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
     * @return FarmUnidadmedidas
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
     * @return FarmUnidadmedidas
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
     * Set auusuariocreacion
     *
     * @param string $auusuariocreacion
     * @return FarmUnidadmedidas
     */
    public function setAuusuariocreacion($auusuariocreacion)
    {
        $this->auusuariocreacion = $auusuariocreacion;

        return $this;
    }

    /**
     * Get auusuariocreacion
     *
     * @return string 
     */
    public function getAuusuariocreacion()
    {
        return $this->auusuariocreacion;
    }

    /**
     * Set aufechacreacion
     *
     * @param \DateTime $aufechacreacion
     * @return FarmUnidadmedidas
     */
    public function setAufechacreacion($aufechacreacion)
    {
        $this->aufechacreacion = $aufechacreacion;

        return $this;
    }

    /**
     * Get aufechacreacion
     *
     * @return \DateTime 
     */
    public function getAufechacreacion()
    {
        return $this->aufechacreacion;
    }

    /**
     * Set auusuariomodificacion
     *
     * @param string $auusuariomodificacion
     * @return FarmUnidadmedidas
     */
    public function setAuusuariomodificacion($auusuariomodificacion)
    {
        $this->auusuariomodificacion = $auusuariomodificacion;

        return $this;
    }

    /**
     * Get auusuariomodificacion
     *
     * @return string 
     */
    public function getAuusuariomodificacion()
    {
        return $this->auusuariomodificacion;
    }

    /**
     * Set aufechamodificacion
     *
     * @param \DateTime $aufechamodificacion
     * @return FarmUnidadmedidas
     */
    public function setAufechamodificacion($aufechamodificacion)
    {
        $this->aufechamodificacion = $aufechamodificacion;

        return $this;
    }

    /**
     * Get aufechamodificacion
     *
     * @return \DateTime 
     */
    public function getAufechamodificacion()
    {
        return $this->aufechamodificacion;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return FarmUnidadmedidas
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
