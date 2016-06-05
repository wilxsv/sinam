<?php

namespace Sinam\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntGrupoterapeutico
 *
 * @ORM\Table(name="mnt_grupoterapeutico")
 * @ORM\Entity
 */
class MntGrupoterapeutico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_grupoterapeutico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="grupoterapeutico", type="string", length=50, nullable=false)
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
