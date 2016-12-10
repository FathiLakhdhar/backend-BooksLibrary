<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 10:43
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;

use Bibliotheque\Bundle\BiblioBundle\Entity\Personne;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPersonneData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

    }
}