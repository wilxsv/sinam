<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAreafarmacia
 *
 * @ORM\Table(name="mnt_areafarmacia", indexes={@ORM\Index(name="IDX_9C2703E5947B0200", columns={"idfarmacia"})})
 * @ORM\Entity
 */
class MntAreafarmacia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_areafarmacia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=30, nullable=false)
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="habilitado", type="string", length=1, nullable=false)
     */
    private $habilitado;

    /**
     * @var \MntFarmacia
     *
     * @ORM\ManyToOne(targetEntity="MntFarmacia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfarmacia", referencedColumnName="id")
     * })
     */
    private $idfarmacia;



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
     * Set area
     *
     * @param string $area
     * @return MntAreafarmacia
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set habilitado
     *
     * @param string $habilitado
     * @return MntAreafarmacia
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
     * Set idfarmacia
     *
     * @param \Sinam\CoreBundle\Entity\MntFarmacia $idfarmacia
     * @return MntAreafarmacia
     */
    public function setIdfarmacia(\Sinam\CoreBundle\Entity\MntFarmacia $idfarmacia = null)
    {
        $this->idfarmacia = $idfarmacia;

        return $this;
    }

    /**
     * Get idfarmacia
     *
     * @return \Sinam\CoreBundle\Entity\MntFarmacia 
     */
    public function getIdfarmacia()
    {
        return $this->idfarmacia;
    }
}
