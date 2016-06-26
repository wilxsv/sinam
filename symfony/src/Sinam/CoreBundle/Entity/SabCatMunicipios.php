<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatMunicipios
 */
class SabCatMunicipios
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigomunicipio;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $estasincronizada;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatDepartamentos
     */
    private $idDepartamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idSiap;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idSiap = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigomunicipio
     *
     * @param string $codigomunicipio
     * @return SabCatMunicipios
     */
    public function setCodigomunicipio($codigomunicipio)
    {
        $this->codigomunicipio = $codigomunicipio;

        return $this;
    }

    /**
     * Get codigomunicipio
     *
     * @return string 
     */
    public function getCodigomunicipio()
    {
        return $this->codigomunicipio;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatMunicipios
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
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatMunicipios
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
     * Set idDepartamento
     *
     * @param \Sinam\CoreBundle\Entity\SabCatDepartamentos $idDepartamento
     * @return SabCatMunicipios
     */
    public function setIdDepartamento(\Sinam\CoreBundle\Entity\SabCatDepartamentos $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \Sinam\CoreBundle\Entity\SabCatDepartamentos 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Add idSiap
     *
     * @param \Sinam\CoreBundle\Entity\CtlMunicipio $idSiap
     * @return SabCatMunicipios
     */
    public function addIdSiap(\Sinam\CoreBundle\Entity\CtlMunicipio $idSiap)
    {
        $this->idSiap[] = $idSiap;

        return $this;
    }

    /**
     * Remove idSiap
     *
     * @param \Sinam\CoreBundle\Entity\CtlMunicipio $idSiap
     */
    public function removeIdSiap(\Sinam\CoreBundle\Entity\CtlMunicipio $idSiap)
    {
        $this->idSiap->removeElement($idSiap);
    }

    /**
     * Get idSiap
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdSiap()
    {
        return $this->idSiap;
    }
}
