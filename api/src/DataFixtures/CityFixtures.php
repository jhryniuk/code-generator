<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cities = [
            'Szczecin',
            'Gdańsk',
            'Olsztyn',
            'Gorzów Wielkopolski',
            'Zielona Góra',
            'Poznań',
            'Bydgoszcz',
            'Warszawa',
            'Białystok',
            'Wrocław',
            'Łódź',
            'Kielce',
            'Lublin',
            'Opole',
            'Katowice',
            'Kraków',
            'Rzeszów',
        ];

        foreach ($cities as $ci) {
            $city = new City();
            $city->setName($ci);
            $manager->persist($city);
            $manager->flush();
        }
    }
}
