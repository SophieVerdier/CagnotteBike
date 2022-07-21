<?php

namespace App\DataFixtures;
use App\Entity\Cycle;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CycleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $cycle = new Cycle();
        $cycle->setType('VTT');
        $cycle->setClient($this->getReference('Client'));
        $manager->persist($cycle);
        
        $manager->flush();
    }

    public function getDependencies()
    {
      
        return [
          ClientFixtures::class,
        ];
    }
}
