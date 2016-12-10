<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 02:15
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;
use Bibliotheque\Bundle\BiblioBundle\Entity\Edition;
use Bibliotheque\Bundle\BiblioBundle\Entity\Langue;
use Bibliotheque\Bundle\BiblioBundle\Entity\Livre;
use Bibliotheque\Bundle\BiblioBundle\Entity\Personne;
use Bibliotheque\Bundle\BiblioBundle\Entity\TypePersonne;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTypePersonneData implements FixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
    }
}