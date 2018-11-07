<?php

namespace App\DataFixtures;

use App\Entity\Panier;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PanierFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $panier = new Panier();
		$user = $manager->getRepository(User::class)->findOneBy(['username' => 'client']);
		$produit = $manager->getRepository(Produit::class)->findOneBy(['nom'=>'Stylo noir']);

    $panier->setUser($user)
	        ->setDateAchat(new \DateTime())
            ->setQuantite(2)
	        ->addProduit($produit);


        $manager->persist($panier);
        $manager->flush();
    }
}
