<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatDepartamentos
 *
 * @ORM\Table(name="sab_cat_departamentos", uniqueConstraints={@ORM\UniqueConstraint(name="sab_cat_departamentos_codigodepartamento_key", columns={"codigodepartamento"})})
 * @ORM\Entity
 */
class SabCatDepartamentos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_departamentos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigodepartamento", type="string", length=2, nullable=false)
     */
    private $codigodepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

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
     * Set codigodepartamento
     *
     * @param string $codigodepartamento
     * @return SabCatDepartamentos
     */
    public function setCodigodepartamento($codigodepartamento)
    {
        $this->codigodepartamento = $codigodepartamento;

        return $this;
    }

    /**
     * Get codigodepartamento
     *
     * @return string 
     */
    public function getCodigodepartamento()
    {
        return $this->codigodepartamento;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatDepartamentos
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
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatDepartamentos
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
