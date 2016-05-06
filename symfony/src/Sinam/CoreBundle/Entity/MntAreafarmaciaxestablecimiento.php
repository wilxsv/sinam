<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAreafarmaciaxestablecimiento
 *
 * @ORM\Table(name="mnt_areafarmaciaxestablecimiento", indexes={@ORM\Index(name="IDX_2B5F8AA845BCCC8", columns={"idarea"})})
 * @ORM\Entity
 */
class MntAreafarmaciaxestablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idrelacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_areafarmaciaxestablecimiento_idrelacion_seq", allocationSize=1, initialValue=1)
     */
    private $idrelacion;

    /**
     * @var string
     *
     * @ORM\Column(name="habilitado", type="string", length=1, nullable=false)
     */
    private $habilitado;

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
     * @var boolean
     *
     * @ORM\Column(name="carga_sinab", type="boolean", nullable=false)
     */
    private $cargaSinab;

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
     * Get idrelacion
     *
     * @return integer 
     */
    public function getIdrelacion()
    {
        return $this->idrelacion;
    }

    /**
     * Set habilitado
     *
     * @param string $habilitado
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return string 
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Set idestablecimiento
     *
     * @param integer $idestablecimiento
     * @return MntAreafarmaciaxestablecimiento
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
     * @return MntAreafarmaciaxestablecimiento
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
     * Set cargaSinab
     *
     * @param boolean $cargaSinab
     * @return MntAreafarmaciaxestablecimiento
     */
    public function setCargaSinab($cargaSinab)
    {
        $this->cargaSinab = $cargaSinab;

        return $this;
    }

    /**
     * Get cargaSinab
     *
     * @return boolean 
     */
    public function getCargaSinab()
    {
        return $this->cargaSinab;
    }

    /**
     * Set idarea
     *
     * @param \Sinam\CoreBundle\Entity\MntAreafarmacia $idarea
     * @return MntAreafarmaciaxestablecimiento
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
}
