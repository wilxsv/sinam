<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatSubgrupos
 */
class SabCatSubgrupos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $correlativo;

    /**
     * @var integer
     */
    private $idGrupo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $estasincronizada;


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
     * Set correlativo
     *
     * @param string $correlativo
     * @return SabCatSubgrupos
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;

        return $this;
    }

    /**
     * Get correlativo
     *
     * @return string 
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set idGrupo
     *
     * @param integer $idGrupo
     * @return SabCatSubgrupos
     */
    public function setIdGrupo($idGrupo)
    {
        $this->idGrupo = $idGrupo;

        return $this;
    }

    /**
     * Get idGrupo
     *
     * @return integer 
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SabCatSubgrupos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatSubgrupos
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
}
