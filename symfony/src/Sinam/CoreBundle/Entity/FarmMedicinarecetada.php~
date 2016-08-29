<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmMedicinarecetada
 */
class FarmMedicinarecetada
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cantidad;

    /**
     * @var \DateTime
     */
    private $fechaentrega;

    /**
     * @var string
     */
    private $totalMedicamento;

    /**
     * @var integer
     */
    private $idEstablecimientoDespacha;

    /**
     * @var integer
     */
    private $secuenciaLocal;

    /**
     * @var \Sinam\CoreBundle\Entity\FarmCatalogoproductos
     */
    private $idmedicina;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlEstablecimiento
     */
    private $idestablecimiento;


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
     * Set cantidad
     *
     * @param string $cantidad
     * @return FarmMedicinarecetada
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaentrega
     *
     * @param \DateTime $fechaentrega
     * @return FarmMedicinarecetada
     */
    public function setFechaentrega($fechaentrega)
    {
        $this->fechaentrega = $fechaentrega;

        return $this;
    }

    /**
     * Get fechaentrega
     *
     * @return \DateTime 
     */
    public function getFechaentrega()
    {
        return $this->fechaentrega;
    }

    /**
     * Set totalMedicamento
     *
     * @param string $totalMedicamento
     * @return FarmMedicinarecetada
     */
    public function setTotalMedicamento($totalMedicamento)
    {
        $this->totalMedicamento = $totalMedicamento;

        return $this;
    }

    /**
     * Get totalMedicamento
     *
     * @return string 
     */
    public function getTotalMedicamento()
    {
        return $this->totalMedicamento;
    }

    /**
     * Set idEstablecimientoDespacha
     *
     * @param integer $idEstablecimientoDespacha
     * @return FarmMedicinarecetada
     */
    public function setIdEstablecimientoDespacha($idEstablecimientoDespacha)
    {
        $this->idEstablecimientoDespacha = $idEstablecimientoDespacha;

        return $this;
    }

    /**
     * Get idEstablecimientoDespacha
     *
     * @return integer 
     */
    public function getIdEstablecimientoDespacha()
    {
        return $this->idEstablecimientoDespacha;
    }

    /**
     * Set secuenciaLocal
     *
     * @param integer $secuenciaLocal
     * @return FarmMedicinarecetada
     */
    public function setSecuenciaLocal($secuenciaLocal)
    {
        $this->secuenciaLocal = $secuenciaLocal;

        return $this;
    }

    /**
     * Get secuenciaLocal
     *
     * @return integer 
     */
    public function getSecuenciaLocal()
    {
        return $this->secuenciaLocal;
    }

    /**
     * Set idmedicina
     *
     * @param \Sinam\CoreBundle\Entity\FarmCatalogoproductos $idmedicina
     * @return FarmMedicinarecetada
     */
    public function setIdmedicina(\Sinam\CoreBundle\Entity\FarmCatalogoproductos $idmedicina = null)
    {
        $this->idmedicina = $idmedicina;

        return $this;
    }

    /**
     * Get idmedicina
     *
     * @return \Sinam\CoreBundle\Entity\FarmCatalogoproductos 
     */
    public function getIdmedicina()
    {
        return $this->idmedicina;
    }

    /**
     * Set idestablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\CtlEstablecimiento $idestablecimiento
     * @return FarmMedicinarecetada
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
