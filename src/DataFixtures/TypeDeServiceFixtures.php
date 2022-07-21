<?php

namespace App\DataFixtures;

use App\Entity\TypeDeService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeDeServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $typedeservice = new TypeDeService();
        $typedeservice->setNom('');
      

        $manager->persist($typedeservice);
        
        $this->addReference('TypeDeService', $typedeservice);
       
        $manager->flush();
    }
}




       