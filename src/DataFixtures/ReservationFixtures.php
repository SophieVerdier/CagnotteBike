<?php

namespace App\DataFixtures;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reservation = new Reservation();
        
        $reservation->setTitre('Rdv révision');
        $reservation->setDebut(\DateTime::createFromFormat('d-m-Y', '25-12-2022'));
        $reservation->setFin(\DateTime::createFromFormat('d-m-Y', '25-12-2022'));
        $manager->persist($reservation);
    
        $manager->flush();

       
    }
}
