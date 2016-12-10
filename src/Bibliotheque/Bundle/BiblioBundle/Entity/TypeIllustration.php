<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeIllustration
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\TypeIllustrationRepository")
 */
class TypeIllustration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_type_illustration", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_type_illustration;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;

    /**
     * @var Illustration
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Illustration", mappedBy="type_illustration")
     */
    private $illustrations;

    /**
     * Get CodeTypeIllustration
     *
     * @return integer 
     */
    public function getCodeTypeIllustration()
    {
        return $this->code_type_illustration;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TypeIllustration
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->illustrations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add illustrations
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations
     * @return TypeIllustration
     */
    public function addIllustration(\Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations)
    {
        $this->illustrations[] = $illustrations;

        return $this;
    }

    /**
     * Remove illustrations
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations
     */
    public function removeIllustration(\Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations)
    {
        $this->illustrations->removeElement($illustrations);
    }

    /**
     * Get illustrations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIllustrations()
    {
        return $this->illustrations;
    }
}
