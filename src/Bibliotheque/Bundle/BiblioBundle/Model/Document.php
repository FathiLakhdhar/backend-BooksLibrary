<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 11/11/2016
 * Time: 14:58
 */

namespace Bibliotheque\Bundle\BiblioBundle\Model;

use Doctrine\ORM\Mapping as ORM;

class Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code_rengement", type="integer")
     */
    protected $code_rengement;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=30)
     */
    protected $titre;
    /**
     * @var string
     *
     * @ORM\Column(name="sous_titre", type="string", length=30)
     */
    protected $sous_titre;



    /**
     * @return int
     */
    public function getCodeRengement()
    {
        return $this->code_rengement;
    }

    /**
     * @param int $code_rengement
     */
    public function setCodeRengement($code_rengement)
    {
        $this->code_rengement = $code_rengement;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getSousTitre()
    {
        return $this->sous_titre;
    }

    /**
     * @param string $sous_titre
     */
    public function setSousTitre($sous_titre)
    {
        $this->sous_titre = $sous_titre;
    }



}