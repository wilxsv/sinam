<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlDepartamento
 */
class CtlDepartamento
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
    private $codigoCnr;

    /**
     * @var string
     */
    private $abreviatura;

    /**
     * @var string
     */
    private $iso31662;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlEstablecimiento
     */
    private $idEstablecimientoRegion;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlPais
     */
    private $idPais;


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
     * @return CtlDepartamento
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
     * Set codigoCnr
     *
     * @param string $codigoCnr
     * @return CtlDepartamento
     */
    public function setCodigoCnr($codigoCnr)
    {
        $this->codigoCnr = $codigoCnr;

        return $this;
    }

    /**
     * Get codigoCnr
     *
     * @return string 
     */
    public function getCodigoCnr()
    {
        return $this->codigoCnr;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return CtlDepartamento
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set iso31662
     *
     * @param string $iso31662
     * @return CtlDepartamento
     */
    public function setIso31662($iso31662)
    {
        $this->iso31662 = $iso31662;

        return $this;
    }

    /**
     * Get iso31662
     *
     * @return string 
     */
    public function getIso31662()
    {
        return $this->iso31662;
    }

    /**
     * Set idEstablecimientoRegion
     *
     * @param \Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimientoRegion
     * @return CtlDepartamento
     */
    public function setIdEstablecimientoRegion(\Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimientoRegion = null)
    {
        $this->idEstablecimientoRegion = $idEstablecimientoRegion;

        return $this;
    }

    /**
     * Get idEstablecimientoRegion
     *
     * @return \Sinam\CoreBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimientoRegion()
    {
        return $this->idEstablecimientoRegion;
    }

    /**
     * Set idPais
     *
     * @param \Sinam\CoreBundle\Entity\CtlPais $idPais
     * @return CtlDepartamento
     */
    public function setIdPais(\Sinam\CoreBundle\Entity\CtlPais $idPais = null)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get idPais
     *
     * @return \Sinam\CoreBundle\Entity\CtlPais 
     */
    public function getIdPais()
    {
        return $this->idPais;
    }
}
