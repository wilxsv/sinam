<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatSubgrupos
 *
 * @ORM\Table(name="sab_cat_subgrupos")
 * @ORM\Entity
 */
class SabCatSubgrupos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_subgrupos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="correlativo", type="string", length=3, nullable=false)
     */
    private $correlativo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_grupo", type="bigint", nullable=false)
     */
    private $idGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=90, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="smallint", nullable=false)
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
