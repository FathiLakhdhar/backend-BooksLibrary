<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\LangueRepository")
 */
class Langue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_langue", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue()
     */
    private $code_langue;

    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=20)
     */
    private $langue;



    /**
     * Get CodeLangue
     *
     * @return integer 
     */
    public function getCodeLangue()
    {
        return $this->code_langue;
    }

    /**
     * Set langue
     *
     * @param string $langue
     * @return Langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }
}
