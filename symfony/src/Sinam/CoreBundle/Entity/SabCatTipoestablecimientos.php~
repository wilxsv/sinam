<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatTipoestablecimientos
 *
 * @ORM\Table(name="sab_cat_tipoestablecimientos", uniqueConstraints={@ORM\UniqueConstraint(name="sab_cat_tipoestablecimientos_nombrecorto_key", columns={"nombrecorto"})})
 * @ORM\Entity
 */
class SabCatTipoestablecimientos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_tipoestablecimientos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrecorto", type="string", length=4, nullable=false)
     */
    private $nombrecorto;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=60, nullable=false)
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
     * Set nombrecorto
     *
     * @param string $nombrecorto
     * @return SabCatTipoestablecimientos
     */
    public function setNombrecorto($nombrecorto)
    {
        $this->nombrecorto = $nombrecorto;

        return $this;
    }

    /**
     * Get nombrecorto
     *
     * @return string 
     */
    public function getNombrecorto()
    {
        return $this->nombrecorto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SabCatTipoestablecimientos
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
     * @return SabCatTipoestablecimientos
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
