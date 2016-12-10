<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePersonne
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\TypePersonneRepository")
 */
class TypePersonne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_type_personne", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_type_personne;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;

    /**
     * @var Personne
     *
     * @ORM\OneToMany(targetEntity="Personne", mappedBy="type_personne")
     */
    private $personnes;


    /**
     * Get codeTypePersonne
     *
     * @return integer 
     */
    public function getCodeTypePersonne()
    {
        return $this->code_type_personne;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TypePersonne
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
        $this->personnes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add personnes
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $personnes
     * @return TypePersonne
     */
    public function addPersonne(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $personnes)
    {
        $this->personnes[] = $personnes;

        return $this;
    }

    /**
     * Remove personnes
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $personnes
     */
    public function removePersonne(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $personnes)
    {
        $this->personnes->removeElement($personnes);
    }

    /**
     * Get personnes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonnes()
    {
        return $this->personnes;
    }
}
