<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SabCatInstituciones
 *
 * @ORM\Table(name="sab_cat_instituciones")
 * @ORM\Entity
 */
class SabCatInstituciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sab_cat_instituciones_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="porcentajereserva", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $porcentajereserva;

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
     * Set nombre
     *
     * @param string $nombre
     * @return SabCatInstituciones
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
     * Set porcentajereserva
     *
     * @param string $porcentajereserva
     * @return SabCatInstituciones
     */
    public function setPorcentajereserva($porcentajereserva)
    {
        $this->porcentajereserva = $porcentajereserva;

        return $this;
    }

    /**
     * Get porcentajereserva
     *
     * @return string 
     */
    public function getPorcentajereserva()
    {
        return $this->porcentajereserva;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatInstituciones
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
