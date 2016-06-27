<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAreafarmaciaxestablecimiento
 */
class MntAreafarmaciaxestablecimiento
{
    /**
     * @var integer
     */
    private $idrelacion;

    /**
     * @var string
     */
    private $habilitado;

    /**
     * @var integer
     */
    private $idmodalidad;

    /**
     * @var boolean
     */
    private $cargaSinab;

    /**
     * @var boolean
     */
    private $dispensarSeguimiento;

    /**
     * @var \Sinam\CoreBundle\Entity\MntAreafarmacia
     */
    private $idarea;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlEstablecimiento
     */
    private $idestablecimiento;


    /**
     * Get idrelacion
     *
     * @return integer 
     */
    public function getIdrelacion()
    {
        return $this->idrelacion;
    }

    /**
     * Set habilitado
     *
     * @param string $habilitado
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return string 
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Set idmodalidad
     *
     * @param integer $idmodalidad
     * @return MntAreafarmaciaxestablecimiento
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
     * Set cargaSinab
     *
     * @param boolean $cargaSinab
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setCargaSinab($cargaSinab)
    {
        $this->cargaSinab = $cargaSinab;

        return $this;
    }

    /**
     * Get cargaSinab
     *
     * @return boolean 
     */
    public function getCargaSinab()
    {
        return $this->cargaSinab;
    }

    /**
     * Set dispensarSeguimiento
     *
     * @param boolean $dispensarSeguimiento
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setDispensarSeguimiento($dispensarSeguimiento)
    {
        $this->dispensarSeguimiento = $dispensarSeguimiento;

        return $this;
    }

    /**
     * Get dispensarSeguimiento
     *
     * @return boolean 
     */
    public function getDispensarSeguimiento()
    {
        return $this->dispensarSeguimiento;
    }

    /**
     * Set idarea
     *
     * @param \Sinam\CoreBundle\Entity\MntAreafarmacia $idarea
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setIdarea(\Sinam\CoreBundle\Entity\MntAreafarmacia $idarea = null)
    {
        $this->idarea = $idarea;

        return $this;
    }

    /**
     * Get idarea
     *
     * @return \Sinam\CoreBundle\Entity\MntAreafarmacia 
     */
    public function getIdarea()
    {
        return $this->idarea;
    }

    /**
     * Set idestablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\CtlEstablecimiento $idestablecimiento
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setIdestablecimiento(\Sinam\CoreBundle\Entity\CtlEstablecimiento $idestablecimiento = null)
    {
        $this->idestablecimiento = $idestablecimiento;

        return $this;
    }

    /**
     * Get idestablecimiento
     *
     * @return \Sinam\CoreBundle\Entity\CtlEstablecimiento 
     */
    public function getIdestablecimiento()
    {
        return $this->idestablecimiento;
    }
}
