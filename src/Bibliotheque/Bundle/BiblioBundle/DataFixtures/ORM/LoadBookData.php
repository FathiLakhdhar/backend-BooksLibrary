<?php
/**
 * Created by PhpStorm.
 * User: TL50B
 * Date: 01/12/2016
 * Time: 10:59
 */

namespace Bibliotheque\Bundle\BiblioBundle\DataFixtures\ORM;


use Bibliotheque\Bundle\BiblioBundle\Entity\Edition;
use Bibliotheque\Bundle\BiblioBundle\Entity\Langue;
use Bibliotheque\Bundle\BiblioBundle\Entity\Livre;
use Bibliotheque\Bundle\BiblioBundle\Entity\Personne;
use Bibliotheque\Bundle\BiblioBundle\Entity\Theme;
use Bibliotheque\Bundle\BiblioBundle\Entity\TypePersonne;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadBookData implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $em)
    {
        $type1= new TypePersonne();$type1->setType('Auteur');
        $type2= new TypePersonne();$type2->setType('Directeur');
        $type3= new TypePersonne();$type3->setType('Redacteur en chef');

        $p1= new Personne();$p1->setTypePersonne($type1);$p1->setPrenom("Habib");$p1->setNom("Selmi");
        $p2= new Personne();$p2->setTypePersonne($type1);$p2->setPrenom("Ibn");$p2->setNom("Khaldoun");

        $edition1= new Edition();$edition1->setIsbn(123456789);$edition1->setMaison("Méditerranée Edition Senda Baccar MESB");$edition1->setPays("Tunisie");
        $edition2= new Edition();$edition2->setIsbn(987654321);$edition2->setMaison("Sud Éditions");$edition2->setPays("Tunisie");



        $langue1= new Langue();$langue1->setLangue("Arabe");
        $theme3=new Theme();$theme3->setTheme("Social");
        $book1= new Livre();
        $book1->setTitre("Mo9ademet Ebn khaldoun");
        $book1->setSousTitre("");
        $book1->addEcrivain($p2);
        $book1->addLangue($langue1);
        $book1->setEdition($edition2);
        $book1->setNumTome("0");
        $book1->setCodeRengement(1254);


        $em->persist($type1);
        $em->persist($type2);
        $em->persist($type3);
        $em->persist($p1);
        $em->persist($p2);
        $em->persist($edition1);
        $em->persist($edition2);
        $em->persist($langue1);
        $em->persist($book1);

        $em->flush();


    }

}