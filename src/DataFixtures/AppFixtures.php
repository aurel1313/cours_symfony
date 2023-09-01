<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use App\Entity\FoodTruck;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        $ville = new Ville();
        $ville->setNom('Niort');
        $ville->setCodePostal('79000');
        // $product = new Product();
         $manager->persist($ville);
        $foodTruck= new FoodTruck();
        $foodTruck->setNom('cuisine');
        $foodTruck->setTypeCuisine('francais');

        $manager->persist($foodTruck);;

        $bien = new Bien();
        $bien->setNom('ee');
        $bien->setVille('Niort');

        $manager->flush();
    }
}
