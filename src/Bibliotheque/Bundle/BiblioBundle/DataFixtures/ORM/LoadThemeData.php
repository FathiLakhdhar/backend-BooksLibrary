<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 02:22
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;
use Bibliotheque\Bundle\BiblioBundle\Entity\Theme;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadThemeData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $em)
    {
        /*
        $theme1=new Theme();$theme1->setTheme("Amour");
        $theme2=new Theme();$theme2->setTheme("Roumance");
        $theme4=new Theme();$theme4->setTheme("Policiere");
        $theme3=new Theme();$theme3->setTheme("Science-Fiction");

        $em->persist($theme1);
        $em->persist($theme2);
        $em->persist($theme3);
        $em->persist($theme4);

        $em->flush();
        */
    }
}