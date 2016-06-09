<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatUnidadmedidas
 *
 * @ORM\Table(name="sab_cat_unidadmedidas")
 * @ORM\Entity
 */
class SabCatUnidadmedidas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_unidadmedidas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=6, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcionlarga", type="string", length=30, nullable=true)
     */
    private $descripcionlarga;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidadescontenidas", type="integer", nullable=false)
     */
    private $unidadescontenidas;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidaddecimal", type="smallint", nullable=true)
     */
    private $cantidaddecimal;

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return SabCatUnidadmedidas
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
     * Set descripcionlarga
     *
     * @param string $descripcionlarga
     * @return SabCatUnidadmedidas
     */
    public function setDescripcionlarga($descripcionlarga)
    {
        $this->descripcionlarga = $descripcionlarga;

        return $this;
    }

    /**
     * Get descripcionlarga
     *
     * @return string 
     */
    public function getDescripcionlarga()
    {
        return $this->descripcionlarga;
    }

    /**
     * Set unidadescontenidas
     *
     * @param integer $unidadescontenidas
     * @return SabCatUnidadmedidas
     */
    public function setUnidadescontenidas($unidadescontenidas)
    {
        $this->unidadescontenidas = $unidadescontenidas;

        return $this;
    }

    /**
     * Get unidadescontenidas
     *
     * @return integer 
     */
    public function getUnidadescontenidas()
    {
        return $this->unidadescontenidas;
    }

    /**
     * Set cantidaddecimal
     *
     * @param integer $cantidaddecimal
     * @return SabCatUnidadmedidas
     */
    public function setCantidaddecimal($cantidaddecimal)
    {
        $this->cantidaddecimal = $cantidaddecimal;

        return $this;
    }

    /**
     * Get cantidaddecimal
     *
     * @return integer 
     */
    public function getCantidaddecimal()
    {
        return $this->cantidaddecimal;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatUnidadmedidas
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
