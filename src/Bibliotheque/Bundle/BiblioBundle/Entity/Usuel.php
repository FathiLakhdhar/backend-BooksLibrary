<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Bibliotheque\Bundle\BiblioBundle\Model\Document;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\UsuelRepository")
 */
class Usuel extends Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_usuel", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_usuel;


    /**
     * @var Illustration
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Illustration", mappedBy="esuel")
     */
    private $illustrations;

    /**
     * @var Edition
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Edition", inversedBy="usuels")
     * @ORM\JoinColumn(name="isbn", referencedColumnName="isbn")
     */
    private $edition;


    /**
     * @var Langue
     *
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Langue")
     * @ORM\JoinTable(name="Usuels_langues",
     *      joinColumns={@ORM\JoinColumn(name="code_usuel", referencedColumnName="code_usuel")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_langue", referencedColumnName="code_langue")}
     *      )
     */
    private $langues;


    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Personne", mappedBy="usuels")
     */
    private $ecrivains;

    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Theme", inversedBy="usuels")
     * @ORM\JoinTable(name="usuels_themes",
     *      joinColumns={@ORM\JoinColumn(name="code_usuel", referencedColumnName="code_usuel")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_theme", referencedColumnName="code_theme")}
     * )
     */
    private $themes;

    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\wordskey", inversedBy="usuels")
     * @ORM\JoinTable(name="usuels_keyWords",
     *      joinColumns={@ORM\JoinColumn(name="code_usuel", referencedColumnName="code_usuel")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_word", referencedColumnName="code_word")}
     * )
     */
    private $wordskey;


    /**
     * Get CodeUsual
     *
     * @return integer 
     */
    public function getCodeUsual()
    {
        return $this->code_usuel;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->illustrations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ecrivains = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get code_usuel
     *
     * @return integer 
     */
    public function getCodeUsuel()
    {
        return $this->code_usuel;
    }

    /**
     * Add illustrations
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations
     * @return Usuel
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
     * Set edition
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Edition $edition
     * @return Usuel
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
     * @return Usuel
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
     * @return Usuel
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

    /**
     * Add themes
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Theme $themes
     * @return Usuel
     */
    public function addTheme(\Bibliotheque\Bundle\BiblioBundle\Entity\Theme $themes)
    {
        $this->themes[] = $themes;

        return $this;
    }

    /**
     * Remove themes
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Theme $themes
     */
    public function removeTheme(\Bibliotheque\Bundle\BiblioBundle\Entity\Theme $themes)
    {
        $this->themes->removeElement($themes);
    }

    /**
     * Get themes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getThemes()
    {
        return $this->themes;
    }



    /**
     * Add wordskey
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey
     * @return Usuel
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
}
