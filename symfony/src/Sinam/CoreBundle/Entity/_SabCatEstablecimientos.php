<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatEstablecimientos
 *
 * @ORM\Table(name="sab_cat_establecimientos", uniqueConstraints={@ORM\UniqueConstraint(name="sab_cat_establecimientos_codigoestablecimiento_key", columns={"codigoestablecimiento"})}, indexes={@ORM\Index(name="sab_cat_establecimientos_ix_sab_cat_establecimientos", columns={"idpadre", "nivel"}), @ORM\Index(name="IDX_6D791824EF433A34", columns={"id_institucion"}), @ORM\Index(name="IDX_6D7918247EAD49C7", columns={"id_municipio"}), @ORM\Index(name="IDX_6D79182456006F2", columns={"idpadre"}), @ORM\Index(name="IDX_6D79182482E4DF9A", columns={"id_tipoestablecimiento"}), @ORM\Index(name="IDX_6D7918242CA6181C", columns={"id_zona"})})
 * @ORM\Entity
 */
class SabCatEstablecimientos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_establecimientos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoestablecimiento", type="string", length=8, nullable=false)
     */
    private $codigoestablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=80, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=200, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=8, nullable=true)
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="bigint", nullable=true)
     */
    private $nivel;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="smallint", nullable=false)
     */
    private $estasincronizada;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmaestro", type="bigint", nullable=true)
     */
    private $idmaestro;

    /**
     * @var \SabCatInstituciones
     *
     * @ORM\ManyToOne(targetEntity="SabCatInstituciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
     * })
     */
    private $idInstitucion;

    /**
     * @var \SabCatMunicipios
     *
     * @ORM\ManyToOne(targetEntity="SabCatMunicipios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id")
     * })
     */
    private $idMunicipio;

    /**
     * @var \SabCatEstablecimientos
     *
     * @ORM\ManyToOne(targetEntity="SabCatEstablecimientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpadre", referencedColumnName="id")
     * })
     */
    private $idpadre;

    /**
     * @var \SabCatTipoestablecimientos
     *
     * @ORM\ManyToOne(targetEntity="SabCatTipoestablecimientos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipoestablecimiento", referencedColumnName="id")
     * })
     */
    private $idTipoestablecimiento;

    /**
     * @var \SabCatZonas
     *
     * @ORM\ManyToOne(targetEntity="SabCatZonas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_zona", referencedColumnName="id")
     * })
     */
    private $idZona;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SabCatAlmacenes", inversedBy="idEstablecimiento")
     * @ORM\JoinTable(name="sab_cat_almacenesestablecimientos",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_almacen", referencedColumnName="id")
     *   }
     * )
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
     * Set idMunicipio
     *
     * @param \Sinam\CoreBundle\Entity\SabCatMunicipios $idMunicipio
     * @return SabCatEstablecimientos
     */
    public function setIdMunicipio(\Sinam\CoreBundle\Entity\SabCatMunicipios $idMunicipio = null)
    {
        $this->idMunicipio = $idMunicipio;

        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return \Sinam\CoreBundle\Entity\SabCatMunicipios 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
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
