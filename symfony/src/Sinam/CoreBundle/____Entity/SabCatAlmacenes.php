<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatAlmacenes
 *
 * @ORM\Table(name="sab_cat_almacenes")
 * @ORM\Entity
 */
class SabCatAlmacenes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_almacenes_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=70, nullable=false)
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
     * @ORM\Column(name="esfarmacia", type="smallint", nullable=false)
     */
    private $esfarmacia;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="smallint", nullable=false)
     */
    private $estasincronizada;

    /**
     * @var integer
     *
     * @ORM\Column(name="estadoalmacen", type="smallint", nullable=true)
     */
    private $estadoalmacen;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SabCatCatalogoproductos", inversedBy="idAlmacen")
     * @ORM\JoinTable(name="sab_alm_existenciasalmacenes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_almacen", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_producto", referencedColumnName="idpro")
     *   }
     * )
     */
    private $idProducto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SabCatEstablecimientos", mappedBy="idAlmacen")
     */
    private $idEstablecimiento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProducto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idEstablecimiento = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatAlmacenes
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
     * @return SabCatAlmacenes
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
     * @return SabCatAlmacenes
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
     * Set esfarmacia
     *
     * @param integer $esfarmacia
     * @return SabCatAlmacenes
     */
    public function setEsfarmacia($esfarmacia)
    {
        $this->esfarmacia = $esfarmacia;

        return $this;
    }

    /**
     * Get esfarmacia
     *
     * @return integer 
     */
    public function getEsfarmacia()
    {
        return $this->esfarmacia;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatAlmacenes
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
     * Set estadoalmacen
     *
     * @param integer $estadoalmacen
     * @return SabCatAlmacenes
     */
    public function setEstadoalmacen($estadoalmacen)
    {
        $this->estadoalmacen = $estadoalmacen;

        return $this;
    }

    /**
     * Get estadoalmacen
     *
     * @return integer 
     */
    public function getEstadoalmacen()
    {
        return $this->estadoalmacen;
    }

    /**
     * Add idProducto
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto
     * @return SabCatAlmacenes
     */
    public function addIdProducto(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto)
    {
        $this->idProducto[] = $idProducto;

        return $this;
    }

    /**
     * Remove idProducto
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto
     */
    public function removeIdProducto(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto)
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
     * Add idEstablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento
     * @return SabCatAlmacenes
     */
    public function addIdEstablecimiento(\Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento)
    {
        $this->idEstablecimiento[] = $idEstablecimiento;

        return $this;
    }

    /**
     * Remove idEstablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento
     */
    public function removeIdEstablecimiento(\Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento)
    {
        $this->idEstablecimiento->removeElement($idEstablecimiento);
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }
}
