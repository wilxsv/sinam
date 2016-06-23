<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatAlmacenesestablecimientos
 */
class SabCatAlmacenesestablecimientos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $esprincipal;

    /**
     * @var integer
     */
    private $estasincronizada;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatAlmacenes
     */
    private $idAlmacen;

    /**
     * @var \Sinam\CoreBundle\Entity\SabCatEstablecimientos
     */
    private $idEstablecimiento;


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
     * Set esprincipal
     *
     * @param integer $esprincipal
     * @return SabCatAlmacenesestablecimientos
     */
    public function setEsprincipal($esprincipal)
    {
        $this->esprincipal = $esprincipal;

        return $this;
    }

    /**
     * Get esprincipal
     *
     * @return integer 
     */
    public function getEsprincipal()
    {
        return $this->esprincipal;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatAlmacenesestablecimientos
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
     * Set idAlmacen
     *
     * @param \Sinam\CoreBundle\Entity\SabCatAlmacenes $idAlmacen
     * @return SabCatAlmacenesestablecimientos
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
     * Set idEstablecimiento
     *
     * @param \Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento
     * @return SabCatAlmacenesestablecimientos
     */
    public function setIdEstablecimiento(\Sinam\CoreBundle\Entity\SabCatEstablecimientos $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Sinam\CoreBundle\Entity\SabCatEstablecimientos 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }
}
