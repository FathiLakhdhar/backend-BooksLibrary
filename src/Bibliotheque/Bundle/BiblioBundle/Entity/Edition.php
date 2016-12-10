<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Edition
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\EditionRepository")
 */
class Edition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="isbn", type="integer", length=10)
     * @ORM\Id
     * @Groups(groups={"list", "details"})
     */
    private $isbn;



    /**
     * @var string
     *
     * @ORM\Column(name="maison", type="string", length=100)
     * @Groups(groups={"list", "details"})
     */
    private $maison;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=30)
     * @Groups(groups={"list", "details"})
     */
    private $pays;


    /**
     * @var Livre
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Livre", mappedBy="edition")
     * @Groups(groups={"details"})
     */
    private $livres;

    /**
     * @var Usuel
     *
     * @ORM\OneToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Usuel", mappedBy="edition")
     * @Groups(groups={"details"})
     */
    private $usuels;

    /**
     * @param int $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }



    /**
     * Get isbn
     *
     * @return integer 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }




    /**
     * Set maison
     *
     * @param string $maison
     * @return Edition
     */
    public function setMaison($maison)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
     * @return string 
     */
    public function getMaison()
    {
        return $this->maison;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Edition
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add livres
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livres
     * @return Edition
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
     * Add usuels
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels
     * @return Edition
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
