<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmLotes
 *
 * @ORM\Table(name="farm_lotes")
 * @ORM\Entity
 */
class FarmLotes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="farm_lotes_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lote", type="string", length=60, nullable=false)
     */
    private $lote;

    /**
     * @var string
     *
     * @ORM\Column(name="preciolote", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $preciolote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechavencimiento", type="date", nullable=false)
     */
    private $fechavencimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idestablecimiento", type="integer", nullable=false)
     */
    private $idestablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmodalidad", type="integer", nullable=false)
     */
    private $idmodalidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="idprocedencia", type="integer", nullable=true)
     */
    private $idprocedencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_trans_ingreso", type="integer", nullable=true)
     */
    private $idTransIngreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date", nullable=true)
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
