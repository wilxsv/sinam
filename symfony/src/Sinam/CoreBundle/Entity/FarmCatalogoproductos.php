<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmCatalogoproductos
 *
 * @ORM\Table(name="farm_catalogoproductos", indexes={@ORM\Index(name="IDX_725517AAE12A4E52", columns={"idunidadmedida"}), @ORM\Index(name="IDX_725517AAA382C6C4", columns={"idterapeutico"})})
 * @ORM\Entity
 */
class FarmCatalogoproductos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="farm_catalogoproductos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=8, nullable=false)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtipoproducto", type="integer", nullable=true)
     */
    private $idtipoproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveluso", type="integer", nullable=true)
     */
    private $niveluso;

    /**
     * @var string
     *
     * @ORM\Column(name="concentracion", type="string", length=382, nullable=true)
     */
    private $concentracion;

    /**
     * @var string
     *
     * @ORM\Column(name="formafarmaceutica", type="string", length=91, nullable=true)
     */
    private $formafarmaceutica;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacion", type="string", length=150, nullable=true)
     */
    private $presentacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="prioridad", type="integer", nullable=true)
     */
    private $prioridad;

    /**
     * @var string
     *
     * @ORM\Column(name="precioactual", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $precioactual;

    /**
     * @var integer
     *
     * @ORM\Column(name="aplicalote", type="integer", nullable=true)
     */
    private $aplicalote;

    /**
     * @var string
     *
     * @ORM\Column(name="existenciaactual", type="decimal", precision=15, scale=3, nullable=true)
     */
    private $existenciaactual;

    /**
     * @var string
     *
     * @ORM\Column(name="especificacionestecnicas", type="text", nullable=true)
     */
    private $especificacionestecnicas;

    /**
     * @var string
     *
     * @ORM\Column(name="codigonacionesunidas", type="string", length=20, nullable=true)
     */
    private $codigonacionesunidas;

    /**
     * @var integer
     *
     * @ORM\Column(name="pertenecelistadooficial", type="integer", nullable=true)
     */
    private $pertenecelistadooficial;

    /**
     * @var integer
     *
     * @ORM\Column(name="estadoproducto", type="integer", nullable=true)
     */
    private $estadoproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="auusuariocreacion", type="string", length=15, nullable=true)
     */
    private $auusuariocreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aufechacreacion", type="datetime", nullable=true)
     */
    private $aufechacreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="auusuariomodificacion", type="string", length=15, nullable=true)
     */
    private $auusuariomodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="aufechamodificacion", type="datetime", nullable=true)
     */
    private $aufechamodificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="integer", nullable=true)
     */
    private $estasincronizada;

    /**
     * @var integer
     *
     * @ORM\Column(name="idestablecimiento", type="integer", nullable=true)
     */
    private $idestablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable=true)
     */
    private $clasificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="areatecnica", type="integer", nullable=true)
     */
    private $areatecnica;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipouaci", type="integer", nullable=true)
     */
    private $tipouaci;

    /**
     * @var integer
     *
     * @ORM\Column(name="idespecificogasto", type="integer", nullable=true)
     */
    private $idespecificogasto;

    /**
     * @var string
     *
     * @ORM\Column(name="ultimoprecio", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $ultimoprecio;

    /**
     * @var string
     *
     * @ORM\Column(name="idestado", type="string", length=1, nullable=true)
     */
    private $idestado;

    /**
     * @var integer
     *
     * @ORM\Column(name="divisormedicina", type="integer", nullable=true)
     */
    private $divisormedicina;

    /**
     * @var \FarmUnidadmedidas
     *
     * @ORM\ManyToOne(targetEntity="FarmUnidadmedidas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idunidadmedida", referencedColumnName="id")
     * })
     */
    private $idunidadmedida;

    /**
     * @var \MntGrupoterapeutico
     *
     * @ORM\ManyToOne(targetEntity="MntGrupoterapeutico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idterapeutico", referencedColumnName="id")
     * })
     */
    private $idterapeutico;



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
     * Set codigo
     *
     * @param string $codigo
     * @return FarmCatalogoproductos
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set idtipoproducto
     *
     * @param integer $idtipoproducto
     * @return FarmCatalogoproductos
     */
    public function setIdtipoproducto($idtipoproducto)
    {
        $this->idtipoproducto = $idtipoproducto;

        return $this;
    }

    /**
     * Get idtipoproducto
     *
     * @return integer 
     */
    public function getIdtipoproducto()
    {
        return $this->idtipoproducto;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return FarmCatalogoproductos
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
     * Set niveluso
     *
     * @param integer $niveluso
     * @return FarmCatalogoproductos
     */
    public function setNiveluso($niveluso)
    {
        $this->niveluso = $niveluso;

        return $this;
    }

    /**
     * Get niveluso
     *
     * @return integer 
     */
    public function getNiveluso()
    {
        return $this->niveluso;
    }

    /**
     * Set concentracion
     *
     * @param string $concentracion
     * @return FarmCatalogoproductos
     */
    public function setConcentracion($concentracion)
    {
        $this->concentracion = $concentracion;

        return $this;
    }

    /**
     * Get concentracion
     *
     * @return string 
     */
    public function getConcentracion()
    {
        return $this->concentracion;
    }

    /**
     * Set formafarmaceutica
     *
     * @param string $formafarmaceutica
     * @return FarmCatalogoproductos
     */
    public function setFormafarmaceutica($formafarmaceutica)
    {
        $this->formafarmaceutica = $formafarmaceutica;

        return $this;
    }

    /**
     * Get formafarmaceutica
     *
     * @return string 
     */
    public function getFormafarmaceutica()
    {
        return $this->formafarmaceutica;
    }

    /**
     * Set presentacion
     *
     * @param string $presentacion
     * @return FarmCatalogoproductos
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    /**
     * Get presentacion
     *
     * @return string 
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * Set prioridad
     *
     * @param integer $prioridad
     * @return FarmCatalogoproductos
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get prioridad
     *
     * @return integer 
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set precioactual
     *
     * @param string $precioactual
     * @return FarmCatalogoproductos
     */
    public function setPrecioactual($precioactual)
    {
        $this->precioactual = $precioactual;

        return $this;
    }

    /**
     * Get precioactual
     *
     * @return string 
     */
    public function getPrecioactual()
    {
        return $this->precioactual;
    }

    /**
     * Set aplicalote
     *
     * @param integer $aplicalote
     * @return FarmCatalogoproductos
     */
    public function setAplicalote($aplicalote)
    {
        $this->aplicalote = $aplicalote;

        return $this;
    }

    /**
     * Get aplicalote
     *
     * @return integer 
     */
    public function getAplicalote()
    {
        return $this->aplicalote;
    }

    /**
     * Set existenciaactual
     *
     * @param string $existenciaactual
     * @return FarmCatalogoproductos
     */
    public function setExistenciaactual($existenciaactual)
    {
        $this->existenciaactual = $existenciaactual;

        return $this;
    }

    /**
     * Get existenciaactual
     *
     * @return string 
     */
    public function getExistenciaactual()
    {
        return $this->existenciaactual;
    }

    /**
     * Set especificacionestecnicas
     *
     * @param string $especificacionestecnicas
     * @return FarmCatalogoproductos
     */
    public function setEspecificacionestecnicas($especificacionestecnicas)
    {
        $this->especificacionestecnicas = $especificacionestecnicas;

        return $this;
    }

    /**
     * Get especificacionestecnicas
     *
     * @return string 
     */
    public function getEspecificacionestecnicas()
    {
        return $this->especificacionestecnicas;
    }

    /**
     * Set codigonacionesunidas
     *
     * @param string $codigonacionesunidas
     * @return FarmCatalogoproductos
     */
    public function setCodigonacionesunidas($codigonacionesunidas)
    {
        $this->codigonacionesunidas = $codigonacionesunidas;

        return $this;
    }

    /**
     * Get codigonacionesunidas
     *
     * @return string 
     */
    public function getCodigonacionesunidas()
    {
        return $this->codigonacionesunidas;
    }

    /**
     * Set pertenecelistadooficial
     *
     * @param integer $pertenecelistadooficial
     * @return FarmCatalogoproductos
     */
    public function setPertenecelistadooficial($pertenecelistadooficial)
    {
        $this->pertenecelistadooficial = $pertenecelistadooficial;

        return $this;
    }

    /**
     * Get pertenecelistadooficial
     *
     * @return integer 
     */
    public function getPertenecelistadooficial()
    {
        return $this->pertenecelistadooficial;
    }

    /**
     * Set estadoproducto
     *
     * @param integer $estadoproducto
     * @return FarmCatalogoproductos
     */
    public function setEstadoproducto($estadoproducto)
    {
        $this->estadoproducto = $estadoproducto;

        return $this;
    }

    /**
     * Get estadoproducto
     *
     * @return integer 
     */
    public function getEstadoproducto()
    {
        return $this->estadoproducto;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return FarmCatalogoproductos
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set auusuariocreacion
     *
     * @param string $auusuariocreacion
     * @return FarmCatalogoproductos
     */
    public function setAuusuariocreacion($auusuariocreacion)
    {
        $this->auusuariocreacion = $auusuariocreacion;

        return $this;
    }

    /**
     * Get auusuariocreacion
     *
     * @return string 
     */
    public function getAuusuariocreacion()
    {
        return $this->auusuariocreacion;
    }

    /**
     * Set aufechacreacion
     *
     * @param \DateTime $aufechacreacion
     * @return FarmCatalogoproductos
     */
    public function setAufechacreacion($aufechacreacion)
    {
        $this->aufechacreacion = $aufechacreacion;

        return $this;
    }

    /**
     * Get aufechacreacion
     *
     * @return \DateTime 
     */
    public function getAufechacreacion()
    {
        return $this->aufechacreacion;
    }

    /**
     * Set auusuariomodificacion
     *
     * @param string $auusuariomodificacion
     * @return FarmCatalogoproductos
     */
    public function setAuusuariomodificacion($auusuariomodificacion)
    {
        $this->auusuariomodificacion = $auusuariomodificacion;

        return $this;
    }

    /**
     * Get auusuariomodificacion
     *
     * @return string 
     */
    public function getAuusuariomodificacion()
    {
        return $this->auusuariomodificacion;
    }

    /**
     * Set aufechamodificacion
     *
     * @param \DateTime $aufechamodificacion
     * @return FarmCatalogoproductos
     */
    public function setAufechamodificacion($aufechamodificacion)
    {
        $this->aufechamodificacion = $aufechamodificacion;

        return $this;
    }

    /**
     * Get aufechamodificacion
     *
     * @return \DateTime 
     */
    public function getAufechamodificacion()
    {
        return $this->aufechamodificacion;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return FarmCatalogoproductos
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
     * Set idestablecimiento
     *
     * @param integer $idestablecimiento
     * @return FarmCatalogoproductos
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
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return FarmCatalogoproductos
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return string 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set areatecnica
     *
     * @param integer $areatecnica
     * @return FarmCatalogoproductos
     */
    public function setAreatecnica($areatecnica)
    {
        $this->areatecnica = $areatecnica;

        return $this;
    }

    /**
     * Get areatecnica
     *
     * @return integer 
     */
    public function getAreatecnica()
    {
        return $this->areatecnica;
    }

    /**
     * Set tipouaci
     *
     * @param integer $tipouaci
     * @return FarmCatalogoproductos
     */
    public function setTipouaci($tipouaci)
    {
        $this->tipouaci = $tipouaci;

        return $this;
    }

    /**
     * Get tipouaci
     *
     * @return integer 
     */
    public function getTipouaci()
    {
        return $this->tipouaci;
    }

    /**
     * Set idespecificogasto
     *
     * @param integer $idespecificogasto
     * @return FarmCatalogoproductos
     */
    public function setIdespecificogasto($idespecificogasto)
    {
        $this->idespecificogasto = $idespecificogasto;

        return $this;
    }

    /**
     * Get idespecificogasto
     *
     * @return integer 
     */
    public function getIdespecificogasto()
    {
        return $this->idespecificogasto;
    }

    /**
     * Set ultimoprecio
     *
     * @param string $ultimoprecio
     * @return FarmCatalogoproductos
     */
    public function setUltimoprecio($ultimoprecio)
    {
        $this->ultimoprecio = $ultimoprecio;

        return $this;
    }

    /**
     * Get ultimoprecio
     *
     * @return string 
     */
    public function getUltimoprecio()
    {
        return $this->ultimoprecio;
    }

    /**
     * Set idestado
     *
     * @param string $idestado
     * @return FarmCatalogoproductos
     */
    public function setIdestado($idestado)
    {
        $this->idestado = $idestado;

        return $this;
    }

    /**
     * Get idestado
     *
     * @return string 
     */
    public function getIdestado()
    {
        return $this->idestado;
    }

    /**
     * Set divisormedicina
     *
     * @param integer $divisormedicina
     * @return FarmCatalogoproductos
     */
    public function setDivisormedicina($divisormedicina)
    {
        $this->divisormedicina = $divisormedicina;

        return $this;
    }

    /**
     * Get divisormedicina
     *
     * @return integer 
     */
    public function getDivisormedicina()
    {
        return $this->divisormedicina;
    }

    /**
     * Set idunidadmedida
     *
     * @param \Sinam\CoreBundle\Entity\FarmUnidadmedidas $idunidadmedida
     * @return FarmCatalogoproductos
     */
    public function setIdunidadmedida(\Sinam\CoreBundle\Entity\FarmUnidadmedidas $idunidadmedida = null)
    {
        $this->idunidadmedida = $idunidadmedida;

        return $this;
    }

    /**
     * Get idunidadmedida
     *
     * @return \Sinam\CoreBundle\Entity\FarmUnidadmedidas 
     */
    public function getIdunidadmedida()
    {
        return $this->idunidadmedida;
    }

    /**
     * Set idterapeutico
     *
     * @param \Sinam\CoreBundle\Entity\MntGrupoterapeutico $idterapeutico
     * @return FarmCatalogoproductos
     */
    public function setIdterapeutico(\Sinam\CoreBundle\Entity\MntGrupoterapeutico $idterapeutico = null)
    {
        $this->idterapeutico = $idterapeutico;

        return $this;
    }

    /**
     * Get idterapeutico
     *
     * @return \Sinam\CoreBundle\Entity\MntGrupoterapeutico 
     */
    public function getIdterapeutico()
    {
        return $this->idterapeutico;
    }
    
    public function getTipo()
    {
        return $this->idtipoproducto;
    }
    public function getMunicipio()
    {
        return $this->nombre;
    }
    public function getEstablecimiento(){ return $this->nombre; }
    public function addTipo(){ return $this->nombre; }
    public function removeTipo(){ return $this->nombre; }
    public function setTipo($idterapeutico = null){ return $this; }
    public function __toString() { return $this->nombre; }
    
}
