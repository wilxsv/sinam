<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntGrupoterapeutico
 */
class MntGrupoterapeutico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $grupoterapeutico;


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
     * Set grupoterapeutico
     *
     * @param string $grupoterapeutico
     * @return MntGrupoterapeutico
     */
    public function setGrupoterapeutico($grupoterapeutico)
    {
        $this->grupoterapeutico = $grupoterapeutico;

        return $this;
    }

    /**
     * Get grupoterapeutico
     *
     * @return string 
     */
    public function getGrupoterapeutico()
    {
        return $this->grupoterapeutico;
    }
}
