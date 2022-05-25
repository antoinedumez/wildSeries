<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
//Tout d'abord nous ajoutons la classe Factory de FakerPhp
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        //Puis ici nous demandons à la Factory de nous fournir un Faker
        $faker = Factory::create();

        /**
         * L'objet $faker que tu récupère est l'outil qui va te permettre
         * de te générer toutes les données que tu souhaites
         */

        for ($j = 0; $j <= 5; $j++) {
            for ($i = 0; $i < (10); $i++) {
                for ($h = 0; $h < (10); $h++) {
                    $episode = new Episode();
                    //Ce Faker va nous permettre d'alimenter l'instance de Season que l'on souhaite ajouter en base
                    $episode->setSeason($this->getReference('season_' . $j . $i));
                    $episode->setTitle($faker->title());
                    $episode->setNumber($h + 1);
                    $episode->setSynopsys($faker->paragraphs(3, true));

                    $manager->persist($episode);
                }
            }
            $manager->flush();
        }
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}