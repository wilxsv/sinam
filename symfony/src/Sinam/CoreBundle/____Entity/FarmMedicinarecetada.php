<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmMedicinarecetada
 *
 * @ORM\Table(name="farm_medicinarecetada", indexes={@ORM\Index(name="IDX_D91F469BF58EA699", columns={"idmedicina"}), @ORM\Index(name="IDX_D91F469B75BB31F7", columns={"idestablecimiento"})})
 * @ORM\Entity
 */
class FarmMedicinarecetada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="farm_medicinarecetada_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=11, scale=3, nullable=false)
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaentrega", type="date", nullable=true)
     */
    private $fechaentrega;

    /**
     * @var string
     *
     * @ORM\Column(name="total_medicamento", type="string", length=10, nullable=true)
     */
    private $totalMedicamento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento_despacha", type="integer", nullable=true)
     */
    private $idEstablecimientoDespacha;

    /**
     * @var \FarmCatalogoproductos
     *
     * @ORM\ManyToOne(targetEntity="FarmCatalogoproductos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmedicina", referencedColumnName="id")
     * })
     */
    private $idmedicina;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idestablecimiento", referencedColumnName="id")
     * })
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
