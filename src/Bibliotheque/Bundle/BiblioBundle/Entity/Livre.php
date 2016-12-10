<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Bibliotheque\Bundle\BiblioBundle\Model\Document;
use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\LivreRepository")
 */
class Livre extends Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_livre", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_livre;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_tome", type="integer")
     */
    private $numTome;


    /**
     * @var Illustration
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Illustration", mappedBy="livre")
     */
    private $illustrations;

    /**
     * @var wordskey
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\wordskey", inversedBy="livres")
     * @ORM\JoinTable(name="Livres_keyWords",
     *     joinColumns={@ORM\JoinColumn(name="code_livre", referencedColumnName="code_livre")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="code_word", referencedColumnName="code_word")}
     *     )
     */
    private $wordskey;

    /**
     * @var Edition
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Edition", inversedBy="livres")
     * @ORM\JoinColumn(name="isbn", referencedColumnName="isbn")
     */
    private $edition;


    /**
     * @var Langue
     *
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Langue")
     * @ORM\JoinTable(name="Livres_langues",
     *      joinColumns={@ORM\JoinColumn(name="code_livre", referencedColumnName="code_livre")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_langue", referencedColumnName="code_langue")}
     *      )
     */
    private $langues;


    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Personne", mappedBy="livres")
     */
    private $ecrivains;


    /**
     *
     * @return integer
     */
    public function getCodeLivre()
    {
        return $this->code_livre;
    }


    /**
     * Set numTome
     *
     * @param integer $numTome
     * @return Livre
     */
    public function setNumTome($numTome)
    {
        $this->numTome = $numTome;

        return $this;
    }

    /**
     * Get numTome
     *
     * @return integer 
     */
    public function getNumTome()
    {
        return $this->numTome;
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
     * @return Livre
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

    /**
     * Add wordskey
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey
     * @return Livre
     */
    public function addWordskey(\Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey)
    {
        $this->wordskey[] = $wordskey;

        return $this;
    }

    /**
     * Remove wordskey
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey
     */
    public function removeWordskey(\Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey)
    {
        $this->wordskey->removeElement($wordskey);
    }

    /**
     * Get wordskey
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWordskey()
    {
        return $this->wordskey;
    }

    /**
     * Set edition
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Edition $edition
     * @return Livre
     */
    public function setEdition(\Bibliotheque\Bundle\BiblioBundle\Entity\Edition $edition = null)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Edition 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Add langues
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Langue $langues
     * @return Livre
     */
    public function addLangue(\Bibliotheque\Bundle\BiblioBundle\Entity\Langue $langues)
    {
        $this->langues[] = $langues;

        return $this;
    }

    /**
     * Remove langues
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Langue $langues
     */
    public function removeLangue(\Bibliotheque\Bundle\BiblioBundle\Entity\Langue $langues)
    {
        $this->langues->removeElement($langues);
    }

    /**
     * Get langues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * Add ecrivains
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $ecrivains
     * @return Livre
     */
    public function addEcrivain(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $ecrivains)
    {
        $this->ecrivains[] = $ecrivains;

        return $this;
    }

    /**
     * Remove ecrivains
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $ecrivains
     */
    public function removeEcrivain(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $ecrivains)
    {
        $this->ecrivains->removeElement($ecrivains);
    }

    /**
     * Get ecrivains
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEcrivains()
    {
        return $this->ecrivains;
    }
}
