<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * wordskey
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\wordskeyRepository")
 */
class wordskey
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_word", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_word;

    /**
     * @var string
     *
     * @ORM\Column(name="word", type="string", length=20)
     */
    private $word;


    /**
     *
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Livre", mappedBy="wordskey")
     */
    private $livres;


    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Article", mappedBy="wordskey")
     */
    private $articles;


    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Usuel", mappedBy="wordskey")
     */
    private $usuels;


    /**
     * Get codeWord
     *
     * @return integer 
     */
    public function getCodeWord()
    {
        return $this->code_word;
    }

    /**
     * Set word
     *
     * @param string $word
     * @return wordskey
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string 
     */
    public function getWord()
    {
        return $this->word;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livres
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livres
     * @return wordskey
     */
    public function addLivre(\Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livres)
    {
        $this->livres[] = $livres;

        return $this;
    }

    /**
     * Remove livres
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livres
     */
    public function removeLivre(\Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livres)
    {
        $this->livres->removeElement($livres);
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLivres()
    {
        return $this->livres;
    }

    /**
     * Add articles
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Article $articles
     * @return wordskey
     */
    public function addArticle(\Bibliotheque\Bundle\BiblioBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Article $articles
     */
    public function removeArticle(\Bibliotheque\Bundle\BiblioBundle\Entity\Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Add usuels
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels
     * @return wordskey
     */
    public function addUsuel(\Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels)
    {
        $this->usuels[] = $usuels;

        return $this;
    }

    /**
     * Remove usuels
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels
     */
    public function removeUsuel(\Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels)
    {
        $this->usuels->removeElement($usuels);
    }

    /**
     * Get usuels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuels()
    {
        return $this->usuels;
    }
}
