<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use App\Entity\FoodTruck;
use App\Entity\User;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use faker;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AppFixtures extends Fixture
{
    private PasswordHasherFactoryInterface $passwordHasherFactory;
    public function __construct(PasswordHasherFactoryInterface $passwordHasherFactory)
    {
        $this->passwordHasherFactory = $passwordHasherFactory;
    }
    public function load(ObjectManager $manager): void
    {
        //$faker = Faker\Factory::create();

        /*$ville = new Ville();
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

        $manager->flush();*/
        $admin = new User();
        $admin->setNom('nom');
        $admin->setPrenom('prenom');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setEmail("admin@gmail.com");
        $admin->setPassword($this->passwordHasherFactory->getPasswordHasher(User::class)->hash('admin'));
        $manager->persist($admin);
        $manager->flush();
    }
}
