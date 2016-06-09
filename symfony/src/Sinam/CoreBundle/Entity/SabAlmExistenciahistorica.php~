<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabAlmExistenciahistorica
 *
 * @ORM\Table(name="sab_alm_existenciahistorica", indexes={@ORM\Index(name="IDX_E4D147E1B2F7B20", columns={"id_almacen"}), @ORM\Index(name="IDX_E4D147E1F760EA80", columns={"id_producto"})})
 * @ORM\Entity
 */
class SabAlmExistenciahistorica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_alm_existenciahistorica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidaddisponible", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidaddisponible;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidadnodisponible", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidadnodisponible;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidadreservada", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidadreservada;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidadtemporal", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidadtemporal;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidadvencida", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidadvencida;

    /**
     * @var \SabCatAlmacenes
     *
     * @ORM\ManyToOne(targetEntity="SabCatAlmacenes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_almacen", referencedColumnName="id")
     * })
     */
    private $idAlmacen;

    /**
     * @var \SabCatCatalogoproductos
     *
     * @ORM\ManyToOne(targetEntity="SabCatCatalogoproductos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="idpro")
     * })
     */
    private $idProducto;



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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SabAlmExistenciahistorica
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set cantidaddisponible
     *
     * @param string $cantidaddisponible
     * @return SabAlmExistenciahistorica
     */
    public function setCantidaddisponible($cantidaddisponible)
    {
        $this->cantidaddisponible = $cantidaddisponible;

        return $this;
    }

    /**
     * Get cantidaddisponible
     *
     * @return string 
     */
    public function getCantidaddisponible()
    {
        return $this->cantidaddisponible;
    }

    /**
     * Set cantidadnodisponible
     *
     * @param string $cantidadnodisponible
     * @return SabAlmExistenciahistorica
     */
    public function setCantidadnodisponible($cantidadnodisponible)
    {
        $this->cantidadnodisponible = $cantidadnodisponible;

        return $this;
    }

    /**
     * Get cantidadnodisponible
     *
     * @return string 
     */
    public function getCantidadnodisponible()
    {
        return $this->cantidadnodisponible;
    }

    /**
     * Set cantidadreservada
     *
     * @param string $cantidadreservada
     * @return SabAlmExistenciahistorica
     */
    public function setCantidadreservada($cantidadreservada)
    {
        $this->cantidadreservada = $cantidadreservada;

        return $this;
    }

    /**
     * Get cantidadreservada
     *
     * @return string 
     */
    public function getCantidadreservada()
    {
        return $this->cantidadreservada;
    }

    /**
     * Set cantidadtemporal
     *
     * @param string $cantidadtemporal
     * @return SabAlmExistenciahistorica
     */
    public function setCantidadtemporal($cantidadtemporal)
    {
        $this->cantidadtemporal = $cantidadtemporal;

        return $this;
    }

    /**
     * Get cantidadtemporal
     *
     * @return string 
     */
    public function getCantidadtemporal()
    {
        return $this->cantidadtemporal;
    }

    /**
     * Set cantidadvencida
     *
     * @param string $cantidadvencida
     * @return SabAlmExistenciahistorica
     */
    public function setCantidadvencida($cantidadvencida)
    {
        $this->cantidadvencida = $cantidadvencida;

        return $this;
    }

    /**
     * Get cantidadvencida
     *
     * @return string 
     */
    public function getCantidadvencida()
    {
        return $this->cantidadvencida;
    }

    /**
     * Set idAlmacen
     *
     * @param \Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen
     * @return SabAlmExistenciahistorica
     */
    public function setIdAlmacen(\Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen = null)
    {
        $this->idAlmacen = $idAlmacen;

        return $this;
    }

    /**
     * Get idAlmacen
     *
     * @return \Sinam\CoreBundle\Entity\SabCatAlmacenes 
     */
    public function getIdAlmacen()
    {
        return $this->idAlmacen;
    }

    /**
     * Set idProducto
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto
     * @return SabAlmExistenciahistorica
     */
    public function setIdProducto(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \Sinam\CoreBundle\Entity\SabCatCatalogoproductos 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}
