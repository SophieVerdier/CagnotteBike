<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $client = new Client();
        $client->setNom('Verdier');
        $client->setPrenom('Sophie'); 
        $client->setEmail('sophie.verdier188@gmail.com');
        $client->setNumeroTelephone(0625232602); 
        $client->setAdresse('2 avenue du général de gaulle, 67000 Strasbourg');
        $client->setMessage('Hi!');
        $manager->persist($client);
    
        $this->addReference('Client', $client);
        $manager->flush();
    }
}
