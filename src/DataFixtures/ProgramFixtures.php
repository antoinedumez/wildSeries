<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking dead');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $this->addReference('program_' . 1, $program);


        $program = new Program();
        $program->setTitle('breakingbad');
        $program->setSynopsis('Un prof fait cuir de la meth');
        $program->setCategory($this->getReference('category_Aventure'));
        $manager->persist($program);
        $this->addReference('program_' . 2, $program);


        $program = new Program();
        $program->setTitle('Peaky fucking blinder');
        $program->setSynopsis('Comme l\'amour est dans le pré, en un peu mieux');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);
        $this->addReference('program_' . 3, $program);


        $program = new Program();
        $program->setTitle('Casa de papel');
        $program->setSynopsis('Comment gagner aux dames');
        $program->setCategory($this->getReference('category_Fantastique'));
        $manager->persist($program);
        $this->addReference('program_' . 4, $program);


        $program = new Program();
        $program->setTitle('Servante écarlate');
        $program->setSynopsis('C\'était mieux avant !');
        $program->setCategory($this->getReference('category_Horreur'));
        $manager->persist($program);
        $this->addReference('program_' . 5, $program);

        $program = new Program();
        $program->setTitle('yolo');
        $program->setSynopsis('yololo');
        $program->setCategory($this->getReference('category_Horreur'));
        $manager->persist($program);
        $this->addReference('program_' . 0, $program);

        $manager->flush();

    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }


}