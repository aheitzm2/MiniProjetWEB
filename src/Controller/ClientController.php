<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\TypeProduit;
use App\Entity\Voitures;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    /**
     * @Route("/client/add", name="client.add")
     * @return Response
     */
    public function addProduit(){
        $types=$this->getDoctrine()->getRepository(TypeProduit::class)->findAll();
        return $this->render("/frontOff/frontOFFICE_add.html.twig", ["types"=>$types]);
    }
}
