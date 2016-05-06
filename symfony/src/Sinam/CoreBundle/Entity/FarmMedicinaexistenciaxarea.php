<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmMedicinaexistenciaxarea
 *
 * @ORM\Table(name="farm_medicinaexistenciaxarea", indexes={@ORM\Index(name="IDX_FB0BA1FB45BCCC8", columns={"idarea"}), @ORM\Index(name="IDX_FB0BA1FBF58EA699", columns={"idmedicina"}), @ORM\Index(name="IDX_FB0BA1FBB67BC33F", columns={"idlote"})})
 * @ORM\Entity
 */
class FarmMedicinaexistenciaxarea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="farm_medicinaexistenciaxarea_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="existencia", type="decimal", precision=11, scale=3, nullable=false)
     */
    private $existencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="idestablecimiento", type="integer", nullable=false)
     */
    private $idestablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmodalidad", type="integer", nullable=false)
     */
    private $idmodalidad;

    /**
     * @var \MntAreafarmacia
     *
     * @ORM\ManyToOne(targetEntity="MntAreafarmacia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idarea", referencedColumnName="id")
     * })
     */
    private $idarea;

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
     * @var \FarmLotes
     *
     * @ORM\ManyToOne(targetEntity="FarmLotes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idlote", referencedColumnName="id")
     * })
     */
    private $idlote;



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
     * Set existencia
     *
     * @param string $existencia
     * @return FarmMedicinaexistenciaxarea
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;

        return $this;
    }

    /**
     * Get existencia
     *
     * @return string 
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * Set idestablecimiento
     *
     * @param integer $idestablecimiento
     * @return FarmMedicinaexistenciaxarea
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
     * Set idmodalidad
     *
     * @param integer $idmodalidad
     * @return FarmMedicinaexistenciaxarea
     */
    public function setIdmodalidad($idmodalidad)
    {
        $this->idmodalidad = $idmodalidad;

        return $this;
    }

    /**
     * Get idmodalidad
     *
     * @return integer 
     */
    public function getIdmodalidad()
    {
        return $this->idmodalidad;
    }

    /**
     * Set idarea
     *
     * @param \Sinam\CoreBundle\Entity\MntAreafarmacia $idarea
     * @return FarmMedicinaexistenciaxarea
     */
    public function setIdarea(\Sinam\CoreBundle\Entity\MntAreafarmacia $idarea = null)
    {
        $this->idarea = $idarea;

        return $this;
    }

    /**
     * Get idarea
     *
     * @return \Sinam\CoreBundle\Entity\MntAreafarmacia 
     */
    public function getIdarea()
    {
        return $this->idarea;
    }

    /**
     * Set idmedicina
     *
     * @param \Sinam\CoreBundle\Entity\FarmCatalogoproductos $idmedicina
     * @return FarmMedicinaexistenciaxarea
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
     * Set idlote
     *
     * @param \Sinam\CoreBundle\Entity\FarmLotes $idlote
     * @return FarmMedicinaexistenciaxarea
     */
    public function setIdlote(\Sinam\CoreBundle\Entity\FarmLotes $idlote = null)
    {
        $this->idlote = $idlote;

        return $this;
    }

    /**
     * Get idlote
     *
     * @return \Sinam\CoreBundle\Entity\FarmLotes 
     */
    public function getIdlote()
    {
        return $this->idlote;
    }
}
