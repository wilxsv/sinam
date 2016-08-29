<?php
namespace Sinam\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * SabCatAlternativasproducto
 */
class SabCatAlternativasproducto
{
    /**
     * @var string
     */
    private $multiplicador;
    /**
     * @var string
     */
    private $divisor;
    /**
     * @var integer
     */
    private $estasincronizada;
    /**
     * @var \Sinam\CoreBundle\Entity\SabCatCatalogoproductos
     */
    private $id;
    /**
     * @var \Sinam\CoreBundle\Entity\SabCatCatalogoproductos
     */
    private $idProducto;
    /**
     * Set multiplicador
     *
     * @param string $multiplicador
     * @return SabCatAlternativasproducto
     */
    public function setMultiplicador($multiplicador)
    {
        $this->multiplicador = $multiplicador;
        return $this;
    }
    /**
     * Get multiplicador
     *
     * @return string 
     */
    public function getMultiplicador()
    {
        return $this->multiplicador;
    }
    /**
     * Set divisor
     *
     * @param string $divisor
     * @return SabCatAlternativasproducto
     */
    public function setDivisor($divisor)
    {
        $this->divisor = $divisor;
        return $this;
    }
    /**
     * Get divisor
     *
     * @return string 
     */
    public function getDivisor()
    {
        return $this->divisor;
    }
    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return SabCatAlternativasproducto
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
     * Set id
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id
     * @return SabCatAlternativasproducto
     */
    public function setId(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $id = null)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Get id
     *
     * @return \Sinam\CoreBundle\Entity\SabCatCatalogoproductos 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set idProducto
     *
     * @param \Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto
     * @return SabCatAlternativasproducto
     */
    public function setIdProducto(\Sinam\CoreBundle\Entity\SabCatCatalogoproductos $idProducto = null)
    {
        $this->idProducto = $idProducto;
        return $this;
    }
    /**
     * Get idProducto
     *
     * @return \Sinam\CoreBundle\Entity\SabCatCatalogoproductos 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}
