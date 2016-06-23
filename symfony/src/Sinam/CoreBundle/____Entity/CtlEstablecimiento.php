<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstablecimiento
 *
 * @ORM\Table(name="ctl_establecimiento", indexes={@ORM\Index(name="IDX_332BD42CEF433A34", columns={"id_institucion"}), @ORM\Index(name="IDX_332BD42C3544B551", columns={"id_establecimiento_padre"}), @ORM\Index(name="IDX_332BD42C7EAD49C7", columns={"id_municipio"})})
 * @ORM\Entity
 */
class CtlEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_establecimiento", type="integer", nullable=false)
     */
    private $idTipoEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=250, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="decimal", precision=10, scale=4, nullable=true)
     */
    private $longitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_nivel_minsal", type="integer", nullable=true)
     */
    private $idNivelMinsal;

    /**
     * @var integer
     *
     * @ORM\Column(name="cod_ucsf", type="integer", nullable=true)
     */
    private $codUcsf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_expediente", type="string", length=1, nullable=true)
     */
    private $tipoExpediente;

    /**
     * @var boolean
     *
     * @ORM\Column(name="configurado", type="boolean", nullable=true)
     */
    private $configurado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_farmacia", type="boolean", nullable=true)
     */
    private $tipoFarmacia;

    /**
     * @var integer
     *
     * @ORM\Column(name="dias_intermedios_citas", type="integer", nullable=true)
     */
    private $diasIntermediosCitas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="citas_sin_expediente", type="boolean", nullable=true)
     */
    private $citasSinExpediente;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_impresion", type="integer", nullable=true)
     */
    private $tipoImpresion;

    /**
     * @var integer
     *
     * @ORM\Column(name="minutoshora", type="integer", nullable=true)
     */
    private $minutoshora;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempoprevioalacita", type="integer", nullable=true)
     */
    private $tiempoprevioalacita;

    /**
     * @var \CtlInstitucion
     *
     * @ORM\ManyToOne(targetEntity="CtlInstitucion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
     * })
     */
    private $idInstitucion;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento_padre", referencedColumnName="id")
     * })
     */
    private $idEstablecimientoPadre;

    /**
     * @var \CtlMunicipio
     *
     * @ORM\ManyToOne(targetEntity="CtlMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id")
     * })
     */
    private $idMunicipio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="FarmCatalogoproductos", mappedBy="idEstablecimiento")
     */
    private $idProducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProducto = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set idTipoEstablecimiento
     *
     * @param integer $idTipoEstablecimiento
     * @return CtlEstablecimiento
     */
    public function setIdTipoEstablecimiento($idTipoEstablecimiento)
    {
        $this->idTipoEstablecimiento = $idTipoEstablecimiento;

        return $this;
    }

    /**
     * Get idTipoEstablecimiento
     *
     * @return integer 
     */
    public function getIdTipoEstablecimiento()
    {
        return $this->idTipoEstablecimiento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return CtlEstablecimiento
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
     * @return CtlEstablecimiento
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
     * @return CtlEstablecimiento
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
     * Set fax
     *
     * @param string $fax
     * @return CtlEstablecimiento
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return CtlEstablecimiento
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return CtlEstablecimiento
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set idNivelMinsal
     *
     * @param integer $idNivelMinsal
     * @return CtlEstablecimiento
     */
    public function setIdNivelMinsal($idNivelMinsal)
    {
        $this->idNivelMinsal = $idNivelMinsal;

        return $this;
    }

    /**
     * Get idNivelMinsal
     *
     * @return integer 
     */
    public function getIdNivelMinsal()
    {
        return $this->idNivelMinsal;
    }

    /**
     * Set codUcsf
     *
     * @param integer $codUcsf
     * @return CtlEstablecimiento
     */
    public function setCodUcsf($codUcsf)
    {
        $this->codUcsf = $codUcsf;

        return $this;
    }

    /**
     * Get codUcsf
     *
     * @return integer 
     */
    public function getCodUcsf()
    {
        return $this->codUcsf;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return CtlEstablecimiento
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set tipoExpediente
     *
     * @param string $tipoExpediente
     * @return CtlEstablecimiento
     */
    public function setTipoExpediente($tipoExpediente)
    {
        $this->tipoExpediente = $tipoExpediente;

        return $this;
    }

    /**
     * Get tipoExpediente
     *
     * @return string 
     */
    public function getTipoExpediente()
    {
        return $this->tipoExpediente;
    }

    /**
     * Set configurado
     *
     * @param boolean $configurado
     * @return CtlEstablecimiento
     */
    public function setConfigurado($configurado)
    {
        $this->configurado = $configurado;

        return $this;
    }

    /**
     * Get configurado
     *
     * @return boolean 
     */
    public function getConfigurado()
    {
        return $this->configurado;
    }

    /**
     * Set tipoFarmacia
     *
     * @param boolean $tipoFarmacia
     * @return CtlEstablecimiento
     */
    public function setTipoFarmacia($tipoFarmacia)
    {
        $this->tipoFarmacia = $tipoFarmacia;

        return $this;
    }

    /**
     * Get tipoFarmacia
     *
     * @return boolean 
     */
    public function getTipoFarmacia()
    {
        return $this->tipoFarmacia;
    }

    /**
     * Set diasIntermediosCitas
     *
     * @param integer $diasIntermediosCitas
     * @return CtlEstablecimiento
     */
    public function setDiasIntermediosCitas($diasIntermediosCitas)
    {
        $this->diasIntermediosCitas = $diasIntermediosCitas;

        return $this;
    }

    /**
     * Get diasIntermediosCitas
     *
     * @return integer 
     */
    public function getDiasIntermediosCitas()
    {
        return $this->diasIntermediosCitas;
    }

    /**
     * Set citasSinExpediente
     *
     * @param boolean $citasSinExpediente
     * @return CtlEstablecimiento
     */
    public function setCitasSinExpediente($citasSinExpediente)
    {
        $this->citasSinExpediente = $citasSinExpediente;

        return $this;
    }

    /**
     * Get citasSinExpediente
     *
     * @return boolean 
     */
    public function getCitasSinExpediente()
    {
        return $this->citasSinExpediente;
    }

    /**
     * Set tipoImpresion
     *
     * @param integer $tipoImpresion
     * @return CtlEstablecimiento
     */
    public function setTipoImpresion($tipoImpresion)
    {
        $this->tipoImpresion = $tipoImpresion;

        return $this;
    }

    /**
     * Get tipoImpresion
     *
     * @return integer 
     */
    public function getTipoImpresion()
    {
        return $this->tipoImpresion;
    }

    /**
     * Set minutoshora
     *
     * @param integer $minutoshora
     * @return CtlEstablecimiento
     */
    public function setMinutoshora($minutoshora)
    {
        $this->minutoshora = $minutoshora;

        return $this;
    }

    /**
     * Get minutoshora
     *
     * @return integer 
     */
    public function getMinutoshora()
    {
        return $this->minutoshora;
    }

    /**
     * Set tiempoprevioalacita
     *
     * @param integer $tiempoprevioalacita
     * @return CtlEstablecimiento
     */
    public function setTiempoprevioalacita($tiempoprevioalacita)
    {
        $this->tiempoprevioalacita = $tiempoprevioalacita;

        return $this;
    }

    /**
     * Get tiempoprevioalacita
     *
     * @return integer 
     */
    public function getTiempoprevioalacita()
    {
        return $this->tiempoprevioalacita;
    }

    /**
     * Set idInstitucion
     *
     * @param \Sinam\CoreBundle\Entity\CtlInstitucion $idInstitucion
     * @return CtlEstablecimiento
     */
    public function setIdInstitucion(\Sinam\CoreBundle\Entity\CtlInstitucion $idInstitucion = null)
    {
        $this->idInstitucion = $idInstitucion;

        return $this;
    }

    /**
     * Get idInstitucion
     *
     * @return \Sinam\CoreBundle\Entity\CtlInstitucion 
     */
    public function getIdInstitucion()
    {
        return $this->idInstitucion;
    }

    /**
     * Set idEstablecimientoPadre
     *
     * @param \Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimientoPadre
     * @return CtlEstablecimiento
     */
    public function setIdEstablecimientoPadre(\Sinam\CoreBundle\Entity\CtlEstablecimiento $idEstablecimientoPadre = null)
    {
        $this->idEstablecimientoPadre = $idEstablecimientoPadre;

        return $this;
    }

    /**
     * Get idEstablecimientoPadre
     *
     * @return \Sinam\CoreBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimientoPadre()
    {
        return $this->idEstablecimientoPadre;
    }

    /**
     * Set idMunicipio
     *
     * @param \Sinam\CoreBundle\Entity\CtlMunicipio $idMunicipio
     * @return CtlEstablecimiento
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
     * Add idProducto
     *
     * @param \Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto
     * @return CtlEstablecimiento
     */
    public function addIdProducto(\Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto)
    {
        $this->idProducto[] = $idProducto;

        return $this;
    }

    /**
     * Remove idProducto
     *
     * @param \Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto
     */
    public function removeIdProducto(\Sinam\CoreBundle\Entity\FarmCatalogoproductos $idProducto)
    {
        $this->idProducto->removeElement($idProducto);
    }

    /**
     * Get idProducto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
    /**
     * @var \DateTime
     */
    private $actualizado;


    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     * @return CtlEstablecimiento
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;

        return $this;
    }

    /**
     * Get actualizado
     *
     * @return \DateTime 
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }
}
