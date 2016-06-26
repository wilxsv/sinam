<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmLotes
 */
class FarmLotes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $lote;

    /**
     * @var string
     */
    private $preciolote;

    /**
     * @var \DateTime
     */
    private $fechavencimiento;

    /**
     * @var integer
     */
    private $idestablecimiento;

    /**
     * @var integer
     */
    private $idmodalidad;

    /**
     * @var integer
     */
    private $idprocedencia;

    /**
     * @var integer
     */
    private $idTransIngreso;

    /**
     * @var \DateTime
     */
    private $fechaIngreso;


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
     * Set lote
     *
     * @param string $lote
     * @return FarmLotes
     */
    public function setLote($lote)
    {
        $this->lote = $lote;

        return $this;
    }

    /**
     * Get lote
     *
     * @return string 
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * Set preciolote
     *
     * @param string $preciolote
     * @return FarmLotes
     */
    public function setPreciolote($preciolote)
    {
        $this->preciolote = $preciolote;

        return $this;
    }

    /**
     * Get preciolote
     *
     * @return string 
     */
    public function getPreciolote()
    {
        return $this->preciolote;
    }

    /**
     * Set fechavencimiento
     *
     * @param \DateTime $fechavencimiento
     * @return FarmLotes
     */
    public function setFechavencimiento($fechavencimiento)
    {
        $this->fechavencimiento = $fechavencimiento;

        return $this;
    }

    /**
     * Get fechavencimiento
     *
     * @return \DateTime 
     */
    public function getFechavencimiento()
    {
        return $this->fechavencimiento;
    }

    /**
     * Set idestablecimiento
     *
     * @param integer $idestablecimiento
     * @return FarmLotes
     */
    public function setIdestablecimiento($idestablecimiento)
    {
        $this->idestablecimiento = $idestablecimiento;

        return $this;
    }

    /**
     * Get idestablecimiento
     *
     * @return integer 
     */
    public function getIdestablecimiento()
    {
        return $this->idestablecimiento;
    }

    /**
     * Set idmodalidad
     *
     * @param integer $idmodalidad
     * @return FarmLotes
     */
    public function setIdmodalidad($idmodalidad)
    {
        $this->idmodalidad = $idmodalidad;

        return $this;
    }

    /**
     * Get idmodalidad
     *
     * @return integer 
     */
    public function getIdmodalidad()
    {
        return $this->idmodalidad;
    }

    /**
     * Set idprocedencia
     *
     * @param integer $idprocedencia
     * @return FarmLotes
     */
    public function setIdprocedencia($idprocedencia)
    {
        $this->idprocedencia = $idprocedencia;

        return $this;
    }

    /**
     * Get idprocedencia
     *
     * @return integer 
     */
    public function getIdprocedencia()
    {
        return $this->idprocedencia;
    }

    /**
     * Set idTransIngreso
     *
     * @param integer $idTransIngreso
     * @return FarmLotes
     */
    public function setIdTransIngreso($idTransIngreso)
    {
        $this->idTransIngreso = $idTransIngreso;

        return $this;
    }

    /**
     * Get idTransIngreso
     *
     * @return integer 
     */
    public function getIdTransIngreso()
    {
        return $this->idTransIngreso;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return FarmLotes
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }
}
