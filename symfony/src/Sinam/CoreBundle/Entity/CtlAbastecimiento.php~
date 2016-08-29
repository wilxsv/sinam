<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAbastecimiento
 */
class CtlAbastecimiento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $mes;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var integer
     */
    private $anyo;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlEstablecimiento
     */
    private $idEstablecimiento;

    /**
     * @var \Sinam\CoreBundle\Entity\FarmCatalogoproductos
     */
    private $idProducto;


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
     * Set mes
     *
     * @param integer $mes
     * @return CtlAbastecimiento
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return CtlAbastecimiento
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set anyo
     *
     * @param integer $anyo
     * @return CtlAbastecimiento
     */
    public function setAnyo($anyo)
    {
        $this->anyo = $anyo;

        return $this;
    }

    /**
     * Get anyo
     *
     * @return integer 
     */
    public function getAnyo()
    {
        return $this->anyo;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return CtlAbastecimiento
     */
    public function setIdEstablecimiento(\Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Sinam\CoreBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set idProducto
     *
     * @param \Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto
     * @return CtlAbastecimiento
     */
    public function setIdProducto(\Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \Sinam\CoreBundle\Entity\FarmCatalogoproductos 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}
