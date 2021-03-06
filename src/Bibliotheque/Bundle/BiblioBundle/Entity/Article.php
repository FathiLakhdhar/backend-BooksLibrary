<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Bibliotheque\Bundle\BiblioBundle\Entity\Periodique;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_article", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_article;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_page", type="integer")
     */
    private $nbPage;


    /**
     * @var Periodique
     * @ORM\ManyToOne(targetEntity="Periodique", inversedBy="articles")
     * @ORM\JoinColumn(name="code_periodique", referencedColumnName="code_periodique")
     */
    private $periodique;


    /**
     * @var Illustration
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Illustration", mappedBy="article")
     */
    private $illustrations;

    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Personne", mappedBy="articles")
     */
    private $ecrivains;


    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\wordskey", inversedBy="articles")
     * @ORM\JoinTable(name="Articles_keywords",
     *     joinColumns={@ORM\JoinColumn(name= "code_article", referencedColumnName= "code_article")},
     *     inverseJoinColumns={@ORM\JoinColumn(name= "code_word", referencedColumnName= "code_word")}
     *     )
     */
    private $wordskey;


    /**
     * Get CodeArticle
     *
     * @return integer 
     */
    public function getCodeArticle()
    {
        return $this->code_article;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nbPage
     *
     * @param integer $nbPage
     * @return Article
     */
    public function setNbPage($nbPage)
    {
        $this->nbPage = $nbPage;

        return $this;
    }

    /**
     * Get nbPage
     *
     * @return integer 
     */
    public function getNbPage()
    {
        return $this->nbPage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->illustrations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ecrivains = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set periodique
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Periodique $periodique
     * @return Article
     */
    public function setPeriodique(\Bibliotheque\Bundle\BiblioBundle\Entity\Periodique $periodique = null)
    {
        $this->periodique = $periodique;

        return $this;
    }

    /**
     * Get periodique
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Periodique 
     */
    public function getPeriodique()
    {
        return $this->periodique;
    }

    /**
     * Add illustrations
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Illustration $illustrations
     * @return Article
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
     * Add ecrivains
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $ecrivains
     * @return Article
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
     * Add wordskey
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\wordskey $wordskey
     * @return Article
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
