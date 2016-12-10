<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\ThemeRepository")
 */
class Theme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_theme", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_theme;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=30)
     */
    private $theme;



    /**
     * @ORM\ManyToMany(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Usuel", mappedBy="themes")
     */
    private $usuels;


    /**
     * Get codeTheme
     *
     * @return integer 
     */
    public function getCodeTheme()
    {
        return $this->code_theme;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuels
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $usuels
     * @return Theme
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
