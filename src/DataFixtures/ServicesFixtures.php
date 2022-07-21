<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServicesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $services = new Services();
        $services->setNom('Réglage 1 frein');
        $services->setCategorie('Freinage');
        $services->setPrix(15);
        $services->setStatut(1);
        $services->setTypeDeService($this->getReference('TypeDeService'));
        $manager->persist($services);
       
        $manager->flush();
    }

    public function getDependencies()
    {
      
        return [
          TypeDeServiceFixtures::class,
        ];
    }
}


