<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Bibliotheque\Bundle\BiblioBundle\Model\Document;
use Doctrine\ORM\Mapping as ORM;

/**
 * Periodique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\PeriodiqueRepository")
 */
class Periodique extends Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_periodique", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_periodique;


    /**
     * @var Article
     * @ORM\OneToMany(targetEntity="Article", mappedBy="periodique")
     */
    private $articles;

    /**
     * @var Langue
     *
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Langue")
     * @ORM\JoinTable(name="periodiques_langues",
     *      joinColumns={@ORM\JoinColumn(name="code_periodique", referencedColumnName="code_periodique")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_langue", referencedColumnName="code_langue")}
     *      )
     */
    private $langues;

    /**
     * @var Personne
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Personne", inversedBy="periodiques_redacteur_en_chef")
     * @ORM\JoinColumn(name="code_personne", referencedColumnName="code_personne")
     */
    private $redacteur_en_chef;

    /**
     * @var Personne
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Personne", inversedBy="periodiques")
     * @ORM\JoinColumn(name="code_personne", referencedColumnName="code_personne")
     */
    private $directeur;


    /**
     * Get CodePeriodique
     *
     * @return integer 
     */
    public function getCodePeriodique()
    {
        return $this->code_periodique;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add articles
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Article $articles
     * @return Periodique
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
     * Add langues
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Langue $langues
     * @return Periodique
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
     * Set redacteur_en_chef
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $redacteurEnChef
     * @return Periodique
     */
    public function setRedacteurEnChef(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $redacteurEnChef = null)
    {
        $this->redacteur_en_chef = $redacteurEnChef;

        return $this;
    }

    /**
     * Get redacteur_en_chef
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Personne 
     */
    public function getRedacteurEnChef()
    {
        return $this->redacteur_en_chef;
    }

    /**
     * Set directeur
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Personne $directeur
     * @return Periodique
     */
    public function setDirecteur(\Bibliotheque\Bundle\BiblioBundle\Entity\Personne $directeur = null)
    {
        $this->directeur = $directeur;

        return $this;
    }

    /**
     * Get directeur
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Personne 
     */
    public function getDirecteur()
    {
        return $this->directeur;
    }
}
