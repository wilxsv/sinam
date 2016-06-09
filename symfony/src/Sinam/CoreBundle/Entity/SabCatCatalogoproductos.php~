<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatCatalogoproductos
 *
 * @ORM\Table(name="sab_cat_catalogoproductos")
 * @ORM\Entity
 */
class SabCatCatalogoproductos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpro", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_catalogoproductos_idpro_seq", allocationSize=1, initialValue=1)
     */
    private $idpro;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=8, nullable=false)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipoproducto", type="bigint", nullable=false)
     */
    private $idTipoproducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_unidadmedida", type="bigint", nullable=false)
     */
    private $idUnidadmedida;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveluso", type="smallint", nullable=false)
     */
    private $niveluso;

    /**
     * @var string
     *
     * @ORM\Column(name="concentracion", type="text", nullable=true)
     */
    private $concentracion;

    /**
     * @var string
     *
     * @ORM\Column(name="formafarmaceutica", type="string", length=100, nullable=true)
     */
    private $formafarmaceutica;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacion", type="text", nullable=true)
     */
    private $presentacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="pertenecelistadooficial", type="smallint", nullable=false)
     */
    private $pertenecelistadooficial;

    /**
     * @var integer
     *
     * @ORM\Column(name="estadoproducto", type="smallint", nullable=false)
     */
    private $estadoproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="smallint", nullable=false)
     */
    private $estasincronizada;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable=true)
     */
    private $clasificacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SabCatCatalogoproductos", mappedBy="idProducto")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SabCatAlmacenes", mappedBy="idProducto")
     */
    private $idAlmacen;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idAlmacen = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idpro
     *
     * @return integer 
     */
    public function getIdpro()
    {
        return $this->idpro;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return SabCatCatalogoproductos
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
     * Set idTipoproducto
     *
     * @param integer $idTipoproducto
     * @return SabCatCatalogoproductos
     */
    public function setIdTipoproducto($idTipoproducto)
    {
        $this->idTipoproducto = $idTipoproducto;

        return $this;
    }

    /**
     * Get idTipoproducto
     *
     * @return integer 
     */
    public function getIdTipoproducto()
    {
        return $this->idTipoproducto;
    }

    /**
     * Set idUnidadmedida
     *
     * @param integer $idUnidadmedida
     * @return SabCatCatalogoproductos
     */
    public function setIdUnidadmedida($idUnidadmedida)
    {
        $this->idUnidadmedida = $idUnidadmedida;

        return $this;
    }

    /**
     * Get idUnidadmedida
     *
     * @return integer 
     */
    public function getIdUnidadmedida()
    {
        return $this->idUnidadmedida;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * Set pertenecelistadooficial
     *
     * @param integer $pertenecelistadooficial
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * @return SabCatCatalogoproductos
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
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatCatalogoproductos
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
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return SabCatCatalogoproductos
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
     * Add id
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id
     * @return SabCatCatalogoproductos
     */
    public function addId(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id)
    {
        $this->id[] = $id;

        return $this;
    }

    /**
     * Remove id
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id
     */
    public function removeId(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id)
    {
        $this->id->removeElement($id);
    }

    /**
     * Get id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add idAlmacen
     *
     * @param \Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen
     * @return SabCatCatalogoproductos
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
