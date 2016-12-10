<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 02:03
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bibliotheque\Bundle\BiblioBundle\Entity\Langue;
class LoadLangueData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $em)
    {
        /*
        $fr= new Langue();$fr->setLangue("Français");
        $ar= new Langue();$ar->setLangue("Arabe");
        $en= new Langue();$en->setLangue("Anglais");

        $em->persist($fr);
        $em->persist($ar);
        $em->persist($en);

        $em->flush();
*/
    }
}