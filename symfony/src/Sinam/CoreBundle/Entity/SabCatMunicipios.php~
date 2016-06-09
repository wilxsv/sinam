<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatMunicipios
 *
 * @ORM\Table(name="sab_cat_municipios", indexes={@ORM\Index(name="sab_cat_municipios_ix_municipios", columns={"id_departamento", "codigomunicipio"}), @ORM\Index(name="IDX_63E572D16325E299", columns={"id_departamento"})})
 * @ORM\Entity
 */
class SabCatMunicipios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_municipios_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigomunicipio", type="string", length=2, nullable=false)
     */
    private $codigomunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=25, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="smallint", nullable=false)
     */
    private $estasincronizada;

    /**
     * @var \SabCatDepartamentos
     *
     * @ORM\ManyToOne(targetEntity="SabCatDepartamentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departamento", referencedColumnName="id")
     * })
     */
    private $idDepartamento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CtlMunicipio", mappedBy="idSinab")
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
