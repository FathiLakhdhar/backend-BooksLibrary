<?php

namespace Bibliotheque\Bundle\BiblioBundle\Entity;

use Bibliotheque\Bundle\BiblioBundle\Model\Document;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Illustration
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bibliotheque\Bundle\BiblioBundle\Entity\IllustrationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Illustration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_illustration", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $code_illustration;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_page", type="integer")
     */
    private $numeroPage;

    /**
     * @var string
     *
     * @ORM\Column(name="legende", type="string", length=30)
     */
    private $legende;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_legende", type="integer")
     */
    private $numeroLegende;



    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;


    /**
     * @var File
     * @Assert\File(
     *     maxSize="2M",
     *     mimeTypes={"image/png", "image/jpeg"}
     *     )
     */
    private $file;

    private $temp;

    /**
     * @var TypeIllustration
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\TypeIllustration", inversedBy="illustrations")
     * @ORM\JoinColumn(name="code_type_illustration", referencedColumnName="code_type_illustration")
     */
    private $type_illustration;


    /**
     * @var Livre
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Livre", inversedBy="illustrations")
     * @ORM\JoinColumn(name="code_livre", referencedColumnName="code_livre")
     */
    private $livre;

    /**
     * @var Usuel
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Usuel", inversedBy="illustrations")
     * @ORM\JoinColumn(name="code_usuel", referencedColumnName="code_usuel")
     */
    private $esuel;

    /**
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque\Bundle\BiblioBundle\Entity\Article", inversedBy="illustrations")
     * @ORM\JoinColumn(name="code_article", referencedColumnName="code_article")
     */
    private $article;


    /**
     * Get CodeIllustration
     *
     * @return integer 
     */
    public function getCodeIllustration()
    {
        return $this->code_illustration;
    }

    /**
     * Set numeroPage
     *
     * @param integer $numeroPage
     * @return Illustration
     */
    public function setNumeroPage($numeroPage)
    {
        $this->numeroPage = $numeroPage;

        return $this;
    }

    /**
     * Get numeroPage
     *
     * @return integer 
     */
    public function getNumeroPage()
    {
        return $this->numeroPage;
    }

    /**
     * Set legende
     *
     * @param string $legende
     * @return Illustration
     */
    public function setLegende($legende)
    {
        $this->legende = $legende;

        return $this;
    }

    /**
     * Get legende
     *
     * @return string 
     */
    public function getLegende()
    {
        return $this->legende;
    }

    /**
     * Set numeroLegende
     *
     * @param integer $numeroLegende
     * @return Illustration
     */
    public function setNumeroLegende($numeroLegende)
    {
        $this->numeroLegende = $numeroLegende;

        return $this;
    }

    /**
     * Get numeroLegende
     *
     * @return integer 
     */
    public function getNumeroLegende()
    {
        return $this->numeroLegende;
    }

    /**
     * Set type_illustration
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\TypeIllustration $typeIllustration
     * @return Illustration
     */
    public function setTypeIllustration(\Bibliotheque\Bundle\BiblioBundle\Entity\TypeIllustration $typeIllustration = null)
    {
        $this->type_illustration = $typeIllustration;

        return $this;
    }

    /**
     * Get type_illustration
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\TypeIllustration 
     */
    public function getTypeIllustration()
    {
        return $this->type_illustration;
    }

    /**
     * Set livre
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livre
     * @return Illustration
     */
    public function setLivre(\Bibliotheque\Bundle\BiblioBundle\Entity\Livre $livre = null)
    {
        $this->livre = $livre;

        return $this;
    }

    /**
     * Get livre
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Livre 
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Set esuel
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $esuel
     * @return Illustration
     */
    public function setEsuel(\Bibliotheque\Bundle\BiblioBundle\Entity\Usuel $esuel = null)
    {
        $this->esuel = $esuel;

        return $this;
    }

    /**
     * Get esuel
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Usuel 
     */
    public function getEsuel()
    {
        return $this->esuel;
    }

    /**
     * Set article
     *
     * @param \Bibliotheque\Bundle\BiblioBundle\Entity\Article $article
     * @return Illustration
     */
    public function setArticle(\Bibliotheque\Bundle\BiblioBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Bibliotheque\Bundle\BiblioBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }



    /**
     * Sets file.
     *
     * @param File $file
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;
        if (isset($this->path)) {
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return $this
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {

        if (null !== $this->getFile()) {
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }


    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }


        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp) && is_file($this->getUploadRootDir().'/'.$this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }


    public function getAbsolutePath()
    {
        return (null === $this->path)
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return (null === $this->path )
            ? $this->getBlankProfilePicture()
            : $this->getUploadDir().'/'.$this->path;
    }


    public function getWebPathAdmin()
    {
        return (null === $this->path)
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }



    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/photos';
    }

    protected function getBlankProfilePicture()
    {
        return 'img/blank-profile-picture.png';
    }

}
