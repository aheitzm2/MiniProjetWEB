<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\TypeProduit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->addProduits($manager);
    }
    private function addProduits(ObjectManager $manager)
    {
        $produits = [
            ["id"=>1, "nom"=>"t-shirt", "prix"=>29.99, "photo"=>NULL, "disponible"=>true, "stock"=>4 ],
            ["id"=>2, "nom"=>"pantalon", "prix"=>69.99, "photo"=>NULL, "disponible"=>true, "stock"=>1],
            ["id"=>3, "nom"=>"veste", "prix"=>109.99, "photo"=>NULL, "disponible"=>false, "stock"=>0],
            ["id"=>4, "nom"=>"ceinture", "prix"=>19.99, "photo"=>NULL, "disponible"=>true, "stock"=>29]
        ];
        foreach ($produits as $produit ){
            $new_produit=new Produit();
            $new_produit->setNom($produit["nom"]);
            $new_produit->setPrix($produit["prix"]);
            $new_produit->setPhoto($produit["photo"]);
            $new_produit->setDisponible($produit["disponible"]);
            $new_produit->setStock($produit["stock"]);

            $manager->persist($new_produit);
            $manager->flush($new_produit);
        }
    }
}
