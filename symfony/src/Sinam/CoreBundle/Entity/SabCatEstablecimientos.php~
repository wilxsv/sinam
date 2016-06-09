<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatEstablecimientos
 */
class SabCatEstablecimientos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoestablecimiento;

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
    private $nivel;

    /**
     * @var integer
     */
    private $estasincronizada;

    /**
     * @var integer
     */
    private $idmaestro;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatInstituciones
     */
    private $idInstitucion;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatEstablecimientos
     */
    private $idpadre;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatTipoestablecimientos
     */
    private $idTipoestablecimiento;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatZonas
     */
    private $idZona;

    /**
     * @var \Sinam\CoreBundle\Entity\CtlMunicipio
     */
    private $idMunicipio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idAlmacen;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idAlmacen = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set codigoestablecimiento
     *
     * @param string $codigoestablecimiento
     * @return SabCatEstablecimientos
     */
    public function setCodigoestablecimiento($codigoestablecimiento)
    {
        $this->codigoestablecimiento = $codigoestablecimiento;

        return $this;
    }

    /**
     * Get codigoestablecimiento
     *
     * @return string 
     */
    public function getCodigoestablecimiento()
    {
        return $this->codigoestablecimiento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatEstablecimientos
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
     * @return SabCatEstablecimientos
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
     * @return SabCatEstablecimientos
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
     * Set nivel
     *
     * @param integer $nivel
     * @return SabCatEstablecimientos
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatEstablecimientos
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
     * Set idmaestro
     *
     * @param integer $idmaestro
     * @return SabCatEstablecimientos
     */
    public function setIdmaestro($idmaestro)
    {
        $this->idmaestro = $idmaestro;

        return $this;
    }

    /**
     * Get idmaestro
     *
     * @return integer 
     */
    public function getIdmaestro()
    {
        return $this->idmaestro;
    }

    /**
     * Set idInstitucion
     *
     * @param \Sinam\CoreBundle\Entity\SabCatInstituciones $idInstitucion
     * @return SabCatEstablecimientos
     */
    public function setIdInstitucion(\Sinam\CoreBundle\Entity\SabCatInstituciones $idInstitucion = null)
    {
        $this->idInstitucion = $idInstitucion;

        return $this;
    }

    /**
     * Get idInstitucion
     *
     * @return \Sinam\CoreBundle\Entity\SabCatInstituciones 
     */
    public function getIdInstitucion()
    {
        return $this->idInstitucion;
    }

    /**
     * Set idpadre
     *
     * @param \Sinam\CoreBundle\Entity\SabCatEstablecimientos $idpadre
     * @return SabCatEstablecimientos
     */
    public function setIdpadre(\Sinam\CoreBundle\Entity\SabCatEstablecimientos $idpadre = null)
    {
        $this->idpadre = $idpadre;

        return $this;
    }

    /**
     * Get idpadre
     *
     * @return \Sinam\CoreBundle\Entity\SabCatEstablecimientos 
     */
    public function getIdpadre()
    {
        return $this->idpadre;
    }

    /**
     * Set idTipoestablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\SabCatTipoestablecimientos $idTipoestablecimiento
     * @return SabCatEstablecimientos
     */
    public function setIdTipoestablecimiento(\Sinam\CoreBundle\Entity\SabCatTipoestablecimientos $idTipoestablecimiento = null)
    {
        $this->idTipoestablecimiento = $idTipoestablecimiento;

        return $this;
    }

    /**
     * Get idTipoestablecimiento
     *
     * @return \Sinam\CoreBundle\Entity\SabCatTipoestablecimientos 
     */
    public function getIdTipoestablecimiento()
    {
        return $this->idTipoestablecimiento;
    }

    /**
     * Set idZona
     *
     * @param \Sinam\CoreBundle\Entity\SabCatZonas $idZona
     * @return SabCatEstablecimientos
     */
    public function setIdZona(\Sinam\CoreBundle\Entity\SabCatZonas $idZona = null)
    {
        $this->idZona = $idZona;

        return $this;
    }

    /**
     * Get idZona
     *
     * @return \Sinam\CoreBundle\Entity\SabCatZonas 
     */
    public function getIdZona()
    {
        return $this->idZona;
    }

    /**
     * Set idMunicipio
     *
     * @param \Sinam\CoreBundle\Entity\CtlMunicipio $idMunicipio
     * @return SabCatEstablecimientos
     */
    public function setIdMunicipio(\Sinam\CoreBundle\Entity\CtlMunicipio $idMunicipio = null)
    {
        $this->idMunicipio = $idMunicipio;

        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return \Sinam\CoreBundle\Entity\CtlMunicipio 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * Add idAlmacen
     *
     * @param \Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen
     * @return SabCatEstablecimientos
     */
    public function addIdAlmacen(\Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen)
    {
        $this->idAlmacen[] = $idAlmacen;

        return $this;
    }

    /**
     * Remove idAlmacen
     *
     * @param \Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen
     */
    public function removeIdAlmacen(\Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen)
    {
        $this->idAlmacen->removeElement($idAlmacen);
    }

    /**
     * Get idAlmacen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdAlmacen()
    {
        return $this->idAlmacen;
    }
}
