<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 02:28
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;
use Bibliotheque\Bundle\BiblioBundle\Entity\Edition;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadEditionData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /*
        $edition1= new Edition();$edition1->setIsbn(123456789);$edition1->setMaison("Méditerranée Edition Senda Baccar MESB");$edition1->setPays("Tunisie");
        $edition2= new Edition();$edition2->setIsbn(987654321);$edition1->setMaison("Sud Éditions");$edition1->setPays("Tunisie");

        $manager->persist($edition1);
        $manager->persist($edition2);

        $manager->flush();
*/
    }
}